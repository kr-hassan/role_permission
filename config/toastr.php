<?php

return [
    // Limit the number of displayed toasts
    'maxItems' => null,

    'options' => [
        'closeButton'       => false,
        'closeClass'        => 'toast-close-button',
        'closeDuration'     => 300,
        'closeEasing'       => 'swing',
        'closeHtml'         => '<button><i class="icon-off"></i></button>',
        'closeMethod'       => 'fadeOut',
        'closeOnHover'      => true,
        'containerId'       => 'toast-container',
        'debug'             => false,
        'escapeHtml'        => false,
        'extendedTimeOut'   => 1000,
        'hideDuration'      => 1000,
        'hideEasing'        => 'linear',
        'hideMethod'        => 'fadeOut',
        'iconClass'         => 'toast-info',
        'iconClasses'       => [
            'error'   => 'toast-error',
            'info'    => 'toast-info',
            'success' => 'toast-success',
            'warning' => 'toast-warning',
        ],
        'messageClass'      => 'toast-message',
        'newestOnTop'       => true,
        'onHidden'          => null,
        'onShown'           => null,
        'positionClass'     => 'toast-bottom-full-width',
        'preventDuplicates' => true,
        'progressBar'       => true,
        'progressClass'     => 'toast-progress',
        'rtl'               => false,
        'showDuration'      => 300,
        'showEasing'        => 'swing',
        'showMethod'        => 'fadeIn',
        'tapToDismiss'      => true,
        'target'            => 'body',
        'timeOut'           => 3000,
        'titleClass'        => 'toast-title',
        'toastClass'        => 'toast',
    ],
];