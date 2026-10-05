<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatar Voice Chat</title>
    <style>
        body { text-align: center; background-color: #f4f4f4; font-family: Arial, sans-serif; }
        #avatar-container { width: 300px; height: 300px; margin: 20px auto; }
        #avatar { width: 100%; height: 100%; object-fit: cover; }
        button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #007bff; color: white; border: none; border-radius: 5px; }
        button:hover { background: #0056b3; }
        audio { display: block; margin: 20px auto; }
    </style>
</head>
<body>

    <h1>تحدث مع المساعد الخاص بنا 🎤</h1>
    <div id="avatar-container">
        <img id="avatar" 
            src="{{ asset('admin/avatar_idle.gif') }}" 
            data-idle="{{ asset('admin/avatar_idle.gif') }}"
            data-listening="{{ asset('admin/avatar_listening.gif') }}"
            data-thinking="{{ asset('admin/avatar_thinking.gif') }}"
            data-speaking="{{ asset('admin/avatar_speaking.gif') }}"
            alt="Avatar">
    </div>
    <button id="start-record">ابدأ التحدث</button>
    <audio id="audio-response" controls></audio>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const startButton = document.getElementById("start-record");
            const audioResponse = document.getElementById("audio-response");
            const avatar = document.getElementById("avatar");

            let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = "ar-EG";
            recognition.interimResults = false;

            startButton.addEventListener("click", function () {
                avatar.src = avatar.dataset.listening; // تغيير الصورة إلى وضع الاستماع
                recognition.start();
            });

            recognition.onresult = function (event) {
                let transcript = event.results[0][0].transcript;
                console.log("🎤 Voice Input:", transcript);
                avatar.src = avatar.dataset.thinking; // تغيير الصورة إلى وضع التفكير
                getUserResponse(transcript);
            };

            recognition.onerror = function (event) {
                console.error("⚠️ Speech Recognition Error:", event.error);
                avatar.src = avatar.dataset.idle; // الرجوع إلى الوضع الطبيعي عند الخطأ
            };

            function getUserResponse(userText) {
                fetch("/ai-response", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ message: userText }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log("🤖 AI Response:", data.response);

                    // ✅ إذا كان هناك رابط، افتحه في تبويب جديد
                    if (data.route) {
                        window.open(data.route, "_blank");
                    } else {
                        avatar.src = avatar.dataset.speaking;
                        generateTTS(data.response, userText); // تمرير سؤال المستخدم أيضًا
                    }
                    if (data.student_name) {
                        sessionStorage.setItem("student_name", data.student_name); // تخزين الاسم
                    }
                })
                .catch(error => {
                    console.error("⚠️ Error fetching AI response:", error);
                    avatar.src = avatar.dataset.idle;
                });
            }
            

            const userName = "{{ Auth::user()->name ?? 'ضيف' }}";

            // توليد رسالة ترحيبية عند فتح الصفحة
            function welcomeUser() {
                const welcomeMessage = `مرحبا بك  ${userName}، أتمنى أني أقدر أساعدك! , هذه النسخة الاولى للمساعد الذكي الخاص بسكولاسيس`;
                avatar.src = avatar.dataset.speaking; // تغيير الصورة إلى وضع التحدث
                generateTTS(welcomeMessage, ""); // إرسال رسالة الترحيب
            }

            // استدعاء الترحيب تلقائيًا بعد تحميل الصفحة
            setTimeout(welcomeUser, 1000);



            function generateTTS(text, userText) {
                fetch("/save-voice-feedback", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ 
                        message: userText || "ترحيب", // وضع "ترحيب" إذا كان بدون استفسار
                        bot_response: text // نص الرد
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    playResponse(data.audio_url);
                })
                .catch(error => {
                    console.error("⚠️ Error generating TTS:", error);
                    avatar.src = avatar.dataset.idle;
                });
            }


            function playResponse(url) {
                audioResponse.src = url;
                audioResponse.play();
                audioResponse.onended = function () {
                    avatar.src = avatar.dataset.idle; // الرجوع للوضع الطبيعي بعد انتهاء الصوت
                };
            }
        });
    </script>

</body>
</html>
