@extends('admin.layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>

   /* Overlay */
.modal-overlay {
  display: none; /* مخفي افتراضيًا */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  justify-content: center;
  align-items: center;
}

/* Content */
.modal-content {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  width: 400px;
  max-width: 90%;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  text-align: center;
}

/* Close Button */
.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  font-weight: bold;
  color: #333;
  cursor: pointer;
}

textarea, select {
  width: 100%;
  margin-top: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.alert {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
    }
    .rating {
    direction: rtl; /* عرض النجوم من اليمين إلى اليسار */
    display: flex;
    justify-content: center;
    gap: 5px;
  }
  .rating input {
    display: none; /* إخفاء الإذاعة */
  }
  .rating label {
    font-size: 30px;
    color: #ccc;
    cursor: pointer;
  }
  .rating input:checked ~ label,
  .rating label:hover,
  .rating label:hover ~ label {
    color: gold;
  }

</style>


 @if (session('welcome'))
    <script>
        Swal.fire({
            title: 'Welcome!',
            text: "{{ session('welcome') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif



{{-- @if (session('welcome'))
    <script>
        let audio = new Audio("{{ asset('admin/ramdan.mp3') }}");

        Swal.fire({
            title: '🌙 رمضان كريم!',
            html: `<img src="{{ asset('admin/ramdan.webp') }}" alt="Ramadan Mubarak" style="width: 100px; margin-bottom: 10px;">
                   <p>{!! nl2br(session('welcome')) !!}</p>`,
            icon: 'info',
            confirmButtonText: 'شكراً',
            showCloseButton: true,
            didOpen: () => {
                audio.play();
            },
            willClose: () => {
                audio.pause();
                audio.currentTime = 0;
            }
        }).then(() => {
            // بعد إغلاق رسالة الترحيب، إذا كانت هناك نافذة مراجعة، يتم فتحها
            @if(session('show_review_modal'))
                openModal();
            @endif
        });
    </script>
@endif --}}


              

                <!--app-content open-->
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                
                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <div>
                                    <h1 class="page-title">Dashboard</h1>
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </div>
                            </div>

                               
                     
                            <div class="row">

                          
                            </div>
                            <!-- ROW-1 END-->


                            <!-- ROW-3 -->
                            <div class="row">
                                
                               
                            </div>
                            <!-- ROW-3 END -->

                            <!-- ROW-4 -->
                            <div class="row">
                                
                                
                             
                            </div>

                            <!-- ROW-4 END -->
                            <div class="row">
                               
                                
                            </div>
                            <div class="row">
                               
                                
                            </div>
                            <div class="row">
                               
                            </div>

                            
                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
            
@endsection

@push('scripts')
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-messaging-compat.js"></script>

{{-- <script>
    const firebaseConfig = {
        apiKey: "AIzaSyApWJqJ5UV7aic51CGI4qM7C6q77QnW6F4",
        authDomain: "leaders-5300b.firebaseapp.com",
        projectId: "leaders-5300b",
        storageBucket: "leaders-5300b.firebasestorage.app",
        messagingSenderId: "338728992470",
        appId: "1:338728992470:web:01aba99987d46003359377",
        measurementId: "G-20Y04RRZZT"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    // تأكد من أن الـ Service Worker مسجل بشكل صحيح:
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/firebase-messaging-sw.js')
            .then(function(registration) {
                console.log('✅ Service Worker registered:', registration);
                // الآن Firebase Messaging سيتعامل مع الـ Service Worker مباشرة
            })
            .catch(function(err) {
                console.error('❌ Service Worker registration failed:', err);
            });
    } else {
        console.error('❌ Service Worker not supported in this browser.');
    }

    function askPermissionAndSendToken() {
    // طلب إذن الإشعارات
        Notification.requestPermission().then(permission => {
            console.log("🔔 Notification permission:", permission);
            
            // إذا كانت الصلاحية ممنوحة
            if (permission === 'granted') {
                // جلب التوكن من localStorage
                const savedToken = localStorage.getItem('fcm_token');

                // إذا كان التوكن موجودًا بالفعل في localStorage
                if (savedToken) {
                    console.log("📍 Token already exists in localStorage:", savedToken);
                    return; // التوكن محفوظ بالفعل
                }

                // إذا لم يكن موجودًا، طلب التوكن الجديد
                messaging.getToken({
                    vapidKey: 'BPbwSVio7zTsREgT79PEw4nkuDgxvnv4o62zWNl_08LbhKYYqkZDGmvifPZNSNxmotQ0yowmFUMeEaUC8F5Mlp8'
                }).then(token => {
                    if (token) {
                        console.log("✅ Device Token:", token);
                        localStorage.setItem('fcm_token', token); // حفظ التوكن في localStorage

                        // إرسال التوكن إلى السيرفر
                        fetch('{{ route("save.device.token") }}', {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ token: token })
                        }).then(res => res.json())
                        .then(data => {
                            console.log("✅ Token sent to server:", data);
                        })
                        .catch(err => {
                            console.error("❌ Failed to send token:", err);
                        });
                    } else {
                        console.warn("⚠️ No registration token available.");
                    }
                }).catch(err => {
                    console.error("❌ Failed to get token:", err);
                });
            } else {
                console.log("❌ Notification permission denied.");
            }
        }).catch((err) => {
            console.error("❌ Error requesting notification permission:", err);
        });
    }




    // استقبال الرسائل في foreground
    messaging.onMessage((payload) => {
        console.log("📩 Message received:", payload);
        new Notification(payload.notification.title, {
            body: payload.notification.body,
            icon: "/favicon.ico"
        });
    });

    window.onload = function () {
        askPermissionAndSendToken();
    };
</script> --}}
@endpush


         

            
		

        
      
