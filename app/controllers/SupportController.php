<?php


class SupportController extends BaseController {


    public function requestCall($shop_link)
    {
        if (!Input::has('name_help') || !Input::has('cell_help'))
        {
            Flash::error('Datos incompletos');

            return Redirect::back();
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();


        Mail::send('emails.shops.admin.help', compact('shop'), function ($message)
        {
            $message->to('luismec90@gmail.com')
                ->subject('Asistencia a establecimientos');
        });

        if (count(Mail::failures()) == 0)
        {
            Flash::success('Gracias por contactarnos, le llamaremos en breve.');

        } else
        {
            Flash::error('El email no se puedo enviar, intenta con el chat');
        }

        return Redirect::back();
    }
}
