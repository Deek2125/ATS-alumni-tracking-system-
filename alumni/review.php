<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <style>
        /* Add your CSS here */
        .btn {
            display: block;
            margin: 50px auto;
            width: fit-content;
            border: 1px solid #ff004f;
            padding: 14px 50px;
            border-radius: 6px;
            text-decoration: none;
            color: #fff;
            transition: background 0.5s;
        }
        .btn:hover {
            background: #ff004f;
        }
        form input, form textarea {
            width: 100%;
            border: 0;
            outline: none;
            background: #262626;
            padding: 15px;
            margin: 15px 0;
            color: #fff;
            font-size: 18px;
            border-radius: 6px;
        }
        #msg {
            color: #4CAF50;
            font-size: 18px;
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
    <div id="id">
        <div id="Contact">
            <div class="row">
                <div class="col">
                    <div class="contact-left">
                        <h1 class="sub-title">Please Review</h1>
                    </div>
                    <div class="contact-right">
                        <!-- Updated form -->
                        <form name="submit-to-google-sheet" method="POST" action="submit_review.php" id="reviewForm">
                            <input type="text" name="Name" placeholder="Alumni Name" required>
                            <input type="number" name="rating" placeholder="Your Rating (1-5)" required>
                            <textarea name="comment" rows="6" placeholder="Your Comments" required></textarea>
                            <button type="submit" class="btn btn2">Submit</button>
                        </form>
                        <div id="msg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the form and message element
        const form = document.getElementById('reviewForm');
        const msg = document.getElementById("msg");

        form.addEventListener('submit', function(e) {
            e.preventDefault();  // Prevent the form from reloading the page

            // Fetch request to submit the form data to submit_review.php
            fetch('submit_review.php', {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => response.text())  // Get the response text
            .then(response => {
                // Show success message
                msg.innerHTML = response;
                msg.style.display = 'block';  // Display the thank you message

                // Reset the form after 3 seconds
                setTimeout(function() {
                    msg.style.display = 'none';
                    form.reset();
                }, 3000);
            })
            .catch(error => console.error('Error!', error.message));
        });
    </script>
</body>
</html>
