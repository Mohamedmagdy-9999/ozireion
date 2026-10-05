
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ozireion</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at 15% 20%, rgba(99, 102, 241, .18), transparent 30%),
                radial-gradient(circle at 85% 80%, rgba(168, 85, 247, .16), transparent 30%),
                #08090f;
            color: #fff;
            overflow: hidden;
        }

        /* Background glow */
        .glow {
            position: fixed;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(120px);
            opacity: .15;
            pointer-events: none;
        }

        .glow.one {
            background: #6366f1;
            top: -200px;
            left: -150px;
        }

        .glow.two {
            background: #a855f7;
            right: -200px;
            bottom: -200px;
        }

        /* Navbar */
        nav {
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            position: relative;
            z-index: 10;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .logo span {
            color: #8b5cf6;
        }

        .nav-link {
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
            transition: .3s;
        }

        .nav-link:hover {
            color: #fff;
        }

        /* Hero */
        .hero {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            max-width: 850px;
            animation: fadeUp 1s ease forwards;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border: 1px solid rgba(255,255,255,.1);
            background: rgba(255,255,255,.04);
            border-radius: 50px;
            color: #c4b5fd;
            font-size: 13px;
            margin-bottom: 25px;
            backdrop-filter: blur(10px);
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            background: #8b5cf6;
            border-radius: 50%;
            box-shadow: 0 0 15px #8b5cf6;
        }

        h1 {
            font-size: clamp(48px, 8vw, 88px);
            line-height: .98;
            letter-spacing: -5px;
            font-weight: 900;
            margin-bottom: 25px;
        }

        h1 span {
            background: linear-gradient(
                90deg,
                #fff,
                #a78bfa,
                #c084fc,
                #fff
            );
            background-size: 250%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 5s linear infinite;
        }

        .description {
            max-width: 600px;
            margin: auto;
            color: #9ca3af;
            font-size: 17px;
            line-height: 1.8;
        }

        /* Buttons */
        .buttons {
            margin-top: 35px;
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, #7c3aed, #8b5cf6);
            box-shadow: 0 10px 35px rgba(124,58,237,.25);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 45px rgba(124,58,237,.4);
        }

        .btn-secondary {
            color: #ddd;
            border: 1px solid rgba(255,255,255,.12);
            background: rgba(255,255,255,.04);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,.08);
            transform: translateY(-3px);
        }

        /* Bottom info */
        .bottom-info {
            position: absolute;
            bottom: 35px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 35px;
            color: #666;
            font-size: 12px;
        }

        .bottom-info span {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        /* Floating circles */
        .circle {
            position: absolute;
            border: 1px solid rgba(255,255,255,.06);
            border-radius: 50%;
            pointer-events: none;
        }

        .circle.one {
            width: 400px;
            height: 400px;
            top: 10%;
            left: -200px;
        }

        .circle.two {
            width: 500px;
            height: 500px;
            bottom: -300px;
            right: -180px;
        }

        /* Animation */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0%;
            }

            100% {
                background-position: 250%;
            }
        }

        /* Mobile */
        @media (max-width: 600px) {

            nav {
                padding: 0 25px;
            }

            .nav-link {
                display: none;
            }

            h1 {
                letter-spacing: -3px;
                font-size: 52px;
            }

            .description {
                font-size: 15px;
            }

            .bottom-info {
                bottom: 20px;
                gap: 15px;
                font-size: 10px;
            }

            .circle.one {
                width: 250px;
                height: 250px;
            }

            .circle.two {
                width: 300px;
                height: 300px;
            }
        }
    </style>
</head>

<body>

    <div class="glow one"></div>
    <div class="glow two"></div>

    <div class="circle one"></div>
    <div class="circle two"></div>

    <nav>
        <div class="logo">
            <span>Ozireion</span>
        </div>

        <a href="#" class="nav-link">
            Get Started →
        </a>
    </nav>

    <main class="hero">

        <div class="hero-content">

            <div class="badge">
                <span class="badge-dot"></span>
                Welcome to something new
            </div>

            <h1>
                Make your ideas<br>
                <span>come alive.</span>
            </h1>

            <p class="description">
                A simple, beautiful and modern experience designed
                to help you move faster, think bigger and create
                something people remember.
            </p>

            <div class="buttons">

                <a href="#" class="btn btn-primary">
                    Get Started →
                </a>

                <a href="#" class="btn btn-secondary">
                    Explore More
                </a>

            </div>

        </div>

    </main>

    <div class="bottom-info">

        <span>
            ✦ Simple
        </span>

        <span>
            ✦ Modern
        </span>

        <span>
            ✦ Powerful
        </span>

    </div>

</body>
</html>
```
