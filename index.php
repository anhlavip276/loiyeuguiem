<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi Em Người Tôi Yêu</title>
    <style>
        body {
            margin: 0;
            font-family: 'Times New Roman', serif;
            background: linear-gradient(to bottom, #f9d8e8, #ffffff);



            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #5c2a09;
            text-align: center;
            overflow: hidden;
        }
        .container {
            width: 80%;
            max-width: 600px;
            background: #fff;
            padding: 20px 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            border: 2px solid #5c2a09;
            position: relative;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 1em;
            text-shadow: 1px 1px 2px #d9c4a1;
        }
        .current-line {
            font-size: 1.2em;
            margin-bottom: 1em;
            line-height: 1.8em;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #ff6b66;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin-top: 20px;
            display: none;
        }
        button:hover {
            background-color: #ff5a56;
            transform: scale(1.1);
        }
        button:active {
            transform: scale(0.95);
        }
        .heart {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #ff6b66;
            transform: rotate(45deg);
            animation: fly 2s ease-out forwards;
            opacity: 0.8;
        }
        .heart::before,
        .heart::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #ff6b66;
            border-radius: 50%;
        }
        .heart::before {
            top: -10px;
            left: 0;
        }
        .heart::after {
            top: 0;
            left: -10px;
        }
        @keyframes fly {
            0% {
                transform: translateY(0) scale(1) rotate(45deg);
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(-150px) scale(0.8) rotate(45deg);
                opacity: 0;
            }
        }
        #image {
            display: none;
            margin-top: 20px;
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }
        #image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thư gửi em</h1>
        <div class="current-line" id="current-line"></div>
        <button id="show-image-button" onclick="handleButtonClick(); handleButtonClick1();">Lời Kết Cho Bé Yêu</button>
        <div id="image">
            <img src="em.jpg" alt="Cô gái của anh">
        </div>
    </div>
    <script>
        const lines = [
            "Vợ ơi vậy là chúng ta đã yêu nhau được một một tháng rồi .",
            "Khoảng thời gian này anh cảm thấy rất là hạnh phúc khi có em ở trong cuộc đời .",
            "Cùng nhau tiếp tục và cố gắng nhé.",
            "Anh luôn nhớ đến em trong từng khoảnh khắc, nhưng anh là người ít nói nên không biết diễn tả cảm xúc của anh như thế nào cho vợ biết",
            "Em là nguồn cảm hứng và động lực để anh cố gắng hơn mỗi ngày.",
            "Anh yêu sự ngọt ngào và chân thành trong từng lời nói của em.",
            "Anh muốn được nắm tay em trên mỗi chặng đường phía trước, dù có khó khăn hay là vất vả thì cùng nhau cố gắng nhé.",
            "Anh hứa sẽ luôn bên cạnh và bảo vệ em, mong vợ cho anh cơ hội để bảo vệ em nhé.",
            "Anh yêu em hơn bất cứ điều gì trên thế gian này.",
            "Và hôm nay là một ngày đặc biệt chúc em có thể vui vẻ hết ngày hôm nay.",
            "Mình sẽ gặp nhau sau nhé.",
            "Anh yêu của em.",
            "Yêu em rất nhiều"
        ];
        let currentLineIndex = 0;

        function showNextLine() {
            if (currentLineIndex < lines.length) {
                const currentLineElement = document.getElementById("current-line");
                currentLineElement.textContent = lines[currentLineIndex];
                currentLineElement.style.opacity = 1;

                setTimeout(() => {
                    currentLineElement.style.opacity = 0;
                    currentLineIndex++;
                    setTimeout(showNextLine, 500);
                }, 4000);
            } else {
                document.getElementById("show-image-button").style.display = "inline-block";
            }
        }

        function handleButtonClick() {
            // Tạo hiệu ứng trái tim
            createHearts();

            // Xóa dòng chữ với hiệu ứng tan biến
            const currentLineElement = document.getElementById("current-line");
            currentLineElement.style.display = "none";

            // Hiển thị ảnh sau khi hiệu ứng hoàn thành
            setTimeout(() => {
                const image = document.getElementById("image");
                image.style.display = "block";
                image.style.opacity = 1;
            }, 2000);
        }
        function handleButtonClick1() {
            // Thay đổi CSS của button sau khi nhấn
            document.getElementById("myButton").style.display = "none";
        }

        function createHearts() {
            const button = document.getElementById("show-image-button");
            const rect = button.getBoundingClientRect(); // Lấy vị trí nút trên màn hình

            for (let i = 0; i < 10; i++) {
                const heart = document.createElement('div');
                heart.classList.add('heart');
                heart.style.left = `${rect.left + rect.width / 2 - 10}px`;
                heart.style.top = `${rect.top + window.scrollY - 10}px`;
                heart.style.animationDuration = `${Math.random() * 2 + 1}s`;

                document.body.appendChild(heart);

                setTimeout(() => heart.remove(), 2000);
            }
        }

        // Hiển thị lần lượt các dòng khi tải trang
        window.onload = showNextLine;
    </script>
</body>
</html>
