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
            ->whereIn('alliances.status', [0, 1])
            ->lists('alliances.to');

        $alliancesWhereIAmB = DB::table('shops')
            ->join('alliances', 'alliances.to', '=', 'shops.id')
            ->where('shops.id', $shop->id)
            ->whereIn('alliances.status', [0, 1])
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

        /* Eliminar el separador de miles(el punto) si lo tiene  */
        Input::merge(['from_retribution_per_user_granted' => Currency::toBack(Input::get('from_retribution_per_user_granted')) / 100]);
        Input::merge(['from_limit_per_user_granted' => Currency::toBack(Input::get('from_limit_per_user_granted'))]);
        Input::merge(['from_limit_total_granted' => Currency::toBack(Input::get('from_limit_total_granted'))]);
        Input::merge(['to_retribution_per_user_granted' => Currency::toBack(Input::get('to_retribution_per_user_granted')) / 100]);
        Input::merge(['to_limit_per_user_granted' => Currency::toBack(Input::get('to_limit_per_user_granted'))]);
        Input::merge(['to_limit_total_granted' => Currency::toBack(Input::get('to_limit_total_granted'))]);

        $validation = Validator::make(Input::all(), Alliance::$rules);
        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        }

        $to = Shop::findOrFail(Input::get('to'));

        $existsAlliances = Alliance::whereIn('status', [0, 1])
            ->where(function ($query) use ($shop, $to)
            {
                $query->where("from", $shop->id)
                    ->where("to", $to->id);
            })->orWhere(function ($query) use ($shop, $to)
            {
                $query->where("from", $to->id)
                    ->where("to", $shop->id);
            })->get();

        if ($existsAlliances->count() != 0)
        {
            Flash::error('Por favor inténtalo nuevamente');

            return Redirect::back();
        }

        $alliance = Alliance::create(Input::all());

        Input::merge(['alliance_id' => $alliance->id]);
        Input::merge(['shop_id' => $shop->id]);

        AllianceRecord::create(Input::all());

        $route = route("pending_alliance_path", [$to->link, $alliance->id]);
        $notificationBody = "El establecimiento {$shop->name} te ha solicitado una alianza";
        $emailTitle = "Alianza solicitada";
        $emailBody = "El establecimiento {$shop->name} te ha solicitado una alianza.";
        $this->notify($to, $route, $notificationBody, $emailTitle, $emailBody);

        Flash::success('Alianza solicitada exitosamente');

          return Redirect::route('pending_alliance_path', [$shop->link, $alliance->id]);

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
            ->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();
        if ($pendingAlliance->status == 0)
        {
            return View::make('shops.pages.admin.alliances.pending', compact('shop', 'pendingAlliance'));
        } else if ($pendingAlliance->status == 1)
        {
            Flash::success('Esta alianza ya se encuentra activa');

            return Redirect::route('active_alliance_path', [$shop->link, $pendingAlliance->id]);
        } else
        {
            App::abort(404);
        }
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

        /* Eliminar el separador de miles(el punto) si lo tiene  */
        Input::merge(['from_retribution_per_user_granted' => Currency::toBack(Input::get('from_retribution_per_user_granted')) / 100]);
        Input::merge(['from_limit_per_user_granted' => Currency::toBack(Input::get('from_limit_per_user_granted'))]);
        Input::merge(['from_limit_total_granted' => Currency::toBack(Input::get('from_limit_total_granted'))]);
        Input::merge(['to_retribution_per_user_granted' => Currency::toBack(Input::get('to_retribution_per_user_granted')) / 100]);
        Input::merge(['to_limit_per_user_granted' => Currency::toBack(Input::get('to_limit_per_user_granted'))]);
        Input::merge(['to_limit_total_granted' => Currency::toBack(Input::get('to_limit_total_granted'))]);

        AllianceRecord::create(Input::all());

        if ($alliance->from != $shop->id)
        {
            $to = $alliance->shopFrom;
        } else if ($alliance->to != $shop->id)
        {
            $to = $alliance->shopto;
        }

        $route = route("pending_alliance_path", [$to->link, $alliance->id]);
        $notificationBody = "El establecimiento {$shop->name} te ha hecho una contrapropuesta";
        $emailTitle = "Contrapropuesta";
        $emailBody = $notificationBody;
        $this->notify($to, $route, $notificationBody, $emailTitle, $emailBody);

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

        $route = route("active_alliance_path", [$to->link, $alliance->id]);
        $notificationBody = "El establecimiento {$shop->name} ha aceptado tu propuesta. !Ahora son aliados!";
        $emailTitle = "Alianza aceptada";
        $emailBody = $notificationBody;
        $this->notify($to, $route, $notificationBody, $emailTitle, $emailBody);

        Flash::success('Alianza creada exitosamente');

        return Redirect::route('active_alliance_path', [$shop->link, $alliance->id]);
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
            ->where('id', $alliance_id)
            ->where('status', 1)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        return View::make('shops.pages.admin.alliances.active', compact('shop', 'activeAlliance'));

    }

    public function cancelAlliance($shop_link, $alliance_id)
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

        $route = "#";
        $notificationBody = "El establecimiento {$shop->name} ha cancelado la alianza";
        $emailTitle = "Alianza cancelada";
        $emailBody = "El establecimiento {$shop->name} ha cancelado la alianza.";
        $this->notify($to, $route, $notificationBody, $emailTitle, $emailBody);

        Flash::success('Alianza cancelada exitosamente');

        return Redirect::route('active_alliances_path', [$shop->link, $alliance->id]);
    }

    private function notify($shop, $route, $notificationBody, $emailTitle, $emailBody)
    {
        $admins = $shop->admins;
        $to = [];

        foreach ($admins as $admin)
        {
            $notificacion = new Notification;
            $notificacion->user_id = $admin->id;
            $notificacion->url = $route;
            $notificacion->body = $notificationBody;
            $notificacion->save();

            array_push($to, $admin->email);
        }

        if ($to)
        {
            Mail::send('emails.shops.notification', ['title' => $emailTitle, 'body' => $emailBody, 'route' => $route], function ($message) use ($to, $emailTitle)
            {
                $message->to($to)->bcc('luismec90@gmail.com')->subject($emailTitle);
            });

        }


    }

}