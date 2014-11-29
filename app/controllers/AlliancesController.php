<?php

class AlliancesController extends \BaseController {

    public function index($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();

        $selectedTown = Input::get('town');
        $selectedActivity = Input::get('activity');

        $alliancesWhereIAmA = DB::table('shops')
            ->join('alliances', 'alliances.from', '=', 'shops.id')
            ->where('shops.id', $shop->id)
            ->lists('alliances.to');

        $alliancesWhereIAmB = DB::table('shops')
            ->join('alliances', 'alliances.to', '=', 'shops.id')
            ->where('shops.id', $shop->id)
            ->lists('alliances.from');

        $currentAlliances = array_merge($alliancesWhereIAmA, $alliancesWhereIAmB, [$shop->id]);

        $q = Shop::orderBy('name')->whereNotIn('id', $currentAlliances);

        if ($selectedTown)
        {
            $q = $q->where('town_id', $selectedTown);
        }

        if ($selectedActivity)
        {
            $q = $q->whereHas('activities', function ($q2) use ($selectedActivity)
            {
                $q2->where('activities.id', $selectedActivity);
            });
        }

        $shops = $q->get();

        return View::make('shops.pages.admin.alliances.index', compact('shop', 'shops', 'towns', 'activities', 'selectedTown', 'selectedActivity'));
    }

    public function requestAlliance($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        Input::merge(['from' => $shop->id]);

        $validation = Validator::make(Input::all(), Alliance::$rules);
        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        }

        $to = Shop::findOrFail(Input::get('to'));

        $alliance = Alliance::create(Input::all());

        Input::merge(['alliance_id' => $alliance->id]);
        Input::merge(['shop_id' => $shop->id]);

        AllianceRecord::create(Input::all());

        $notificacion = new Notification;
        $notificacion->shop_id = $to->id;
        $notificacion->url = route("pending_alliance_path", [$to->link, $alliance->id]);
        $notificacion->body = "El establecimiento {$shop->name} te ha solicitado una alianza";
        $notificacion->save();

        Flash::success('Alianza solicitada exitosamente');

        return Redirect::back();

    }

    public function pendingAlliances($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $pendingAlliances = Alliance::where('status', '0')
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->get();

        return View::make('shops.pages.admin.alliances.pendings', compact('shop', 'pendingAlliances'));
    }

    public function pendingAlliance($shop_link, $alliance_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $pendingAlliance = Alliance::with(['allianceRecords' => function ($query)
        {
            $query->orderBy('created_at');
        }, 'shopFrom', 'shopTo', 'allianceRecords.shop'])
            ->where('status', '0')
            ->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        return View::make('shops.pages.admin.alliances.pending', compact('shop', 'pendingAlliance'));
    }

    public function contraRequestAlliance($shop_link, $alliance_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $alliance = Alliance::where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        Input::merge(['alliance_id' => $alliance->id]);
        Input::merge(['shop_id' => $shop->id]);

        AllianceRecord::create(Input::all());

        if ($alliance->from != $shop->id)
        {
            $to = $alliance->shopFrom;
        } else if ($alliance->to != $shop->id)
        {
            $to = $alliance->shopto;
        }

        $notificacion = new Notification;
        $notificacion->shop_id = $to->id;
        $notificacion->url = route("pending_alliance_path", [$to->link, $alliance->id]);
        $notificacion->body = "El establecimiento {$shop->name} te ha hecho una contrapropuesta";
        $notificacion->save();

        Flash::success('Propuesta enviada exitosamente');

        return Redirect::back();

    }

    public function acceptRequestAlliance($shop_link, $alliance_id)
    {


        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $alliance = Alliance::with(['allianceRecords' => function ($query)
        {
            $query->orderBy('created_at', 'desc')->first();

        }])->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        $allianceRecord = $alliance->allianceRecords[0];
        $allianceRecord->status = 1;
        $allianceRecord->save();
        $alliance->status = 1;
        $alliance->save();

        if ($alliance->from != $shop->id)
        {
            $to = $alliance->shopFrom;
        } else if ($alliance->to != $shop->id)
        {
            $to = $alliance->shopto;
        }

        $notificacion = new Notification;
        $notificacion->shop_id = $to->id;
        $notificacion->url = route("active_alliance_path", [$to->link, $alliance->id]);
        $notificacion->body = "El establecimiento {$shop->name} ha aceptado tu propuesta. !Ahora son aliados!";
        $notificacion->save();

        Flash::success('Alianza creada exitosamente');

        return Redirect::route('active_alliances_path', [$shop->link]);
    }

    public function activeAlliances($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $activeAlliances = Alliance::where('status', '1')
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->get();

        return View::make('shops.pages.admin.alliances.actives', compact('shop', 'activeAlliances'));
    }

    public function activeAlliance($shop_link, $alliance_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $activeAlliance = Alliance::with(['allianceRecords' => function ($query)
        {
            $query->orderBy('created_at');
        }, 'shopFrom', 'shopTo', 'allianceRecords.shop'])
            ->where('status', '1')
            ->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        return View::make('shops.pages.admin.alliances.active', compact('shop', 'activeAlliance'));
    }

    public function suspendAlliance($shop_link, $alliance_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $alliance = Alliance::with(['allianceRecords' => function ($query)
        {
            $query->orderBy('created_at', 'desc')->first();

        }])->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        $allianceRecord = $alliance->allianceRecords[0];
        $allianceRecord->status = 2;
        $allianceRecord->save();
        $alliance->status = 2;
        $alliance->save();

        if ($alliance->from != $shop->id)
        {
            $to = $alliance->shopFrom;
        } else if ($alliance->to != $shop->id)
        {
            $to = $alliance->shopto;
        }

        $notificacion = new Notification;
        $notificacion->shop_id = $to->id;
        $notificacion->url = route("suspended_alliance_path", [$to->link, $alliance->id]);
        $notificacion->body = "El establecimiento {$shop->name} ha suspendido la alianza";
        $notificacion->save();

        Flash::success('Alianza suspendida exitosamente');

        return Redirect::route('suspended_alliance_path', [$shop->link, $alliance->id]);
    }


    public function suspendedAlliances($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $suspendedAlliances = Alliance::where('status', '2')
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->get();

        return View::make('shops.pages.admin.alliances.suspendeds', compact('shop', 'suspendedAlliances'));
    }

    public function suspendedAlliance($shop_link, $alliance_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $suspendedAlliance = Alliance::with(['allianceRecords' => function ($query)
        {
            $query->orderBy('created_at');
        }, 'shopFrom', 'shopTo', 'allianceRecords.shop'])
            ->where('status', '2')
            ->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        return View::make('shops.pages.admin.alliances.suspended', compact('shop', 'suspendedAlliance'));
    }
}