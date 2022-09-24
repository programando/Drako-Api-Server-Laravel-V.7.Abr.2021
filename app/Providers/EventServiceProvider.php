<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
       'App\Events\InvoiceWasCreatedEvent'                   => ['App\Listeners\InvoiceSendXmlPdfToCustomer', ],
       'App\Events\NoteWasCreatedEvent'                      => ['App\Listeners\NoteSendXmlPdfToCustomer',],
       'App\Events\TercerosNominaWasReportedEvent'           => ['App\Listeners\TercerosNominaWasReportedListener', ],
       'App\Events\ProveedoresOrdCpraReportedEvent'          => ['App\Listeners\ProveedoresOrdCpraReportedListener', ],
       'App\Events\PedidoWasCreateEvent'                     => ['App\Listeners\PedidoWasCreateListener', ],
       'App\Events\InvoiceEvent030AcuseReciboWasCreateEvent' => ['App\Listeners\InvoiceEvent030AcuseReciboWasCreateListener', ],
       'App\Events\TercerosContactosEvent'                    => ['App\Listeners\TercerosContactosListener', ],
    ];

 
}
