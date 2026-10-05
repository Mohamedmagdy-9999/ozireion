<?php

return [
    // تحديد مسار ملف الخدمة (service-account.json) داخل مجلد config/firebase
    'service_account' => env('FIREBASE_SERVICE_ACCOUNT', config_path('firebase/service-account.json')),
];
