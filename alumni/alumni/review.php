<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <style>
        .btn{
    display: block;
    margin: 50px auto;
    width: fit-content;
    border: 1px solid #ff004f;
    padding: 14px 50px;
    border-radius: 6px;
    text-decoration: none;
    color:#fff;
    transition: background 0.5s;
}
.btn:hover{
    background: #ff004f;
}
.contact-left{
    flex-basis: 35%;

}
.contact-right{
    flex-basis: 60%;
}
.contact-left p {
    margin-top: 30px;
}
.contact-left p i{
    color: darkgoldenrod;
    margin-right: 15px;
    font-size: 25px;
}
.social-icons{
    margin-top: 30px;
}
.social-icons a{
    text-decoration: none;
    font-size: 30px;
    margin-right: 15px;
    color: hotpink;
    display: inline-block;
    transition: transform 0.5s;
}
.social-icons a:hover{
    color:#ff004f;
    transform: translateY(-5px);
}
.btn.btn2{
    display: inline-block;
    background: #ff004f;
}
.contact-right form{
    width: 100%;
}
form input,form textarea{
width: 100%;
border:0 ;
outline: none;
background: #262626;
padding: 15px;
margin: 15px 0;
color: #fff;
font-size: 18px;
border-radius: 6px;
    }
    form .btn2{
        padding: 14px 60px;
        font-size: 18px;
        margin-top: 20px;
        cursor: pointer;
    }
    </style>
<div id="id">
    <div id="Contact">
<div class="row">
<div class="col">
    <div class="contact-left">
        <h1 class="sub-title">Please review</h1>
        
        
       
    </div>
    <div class="contact-right">
        <form name="submit-to-google-sheet">
            <input type="text" name="Name" placeholder="Alumni Name" required>
            <input type="number" name="rating" placeholder="Your rating" required>
            <textarea name="comment" rows="6" placeholder="comments"></textarea>
            <button type="submit" class="btn btn2">Submit</button>
        </form>
        <span id ="msg">Thanks for your valuable review</span>
    </div>
</div>
</div>
    </div>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbyLOjv-b72iKNFOSrBTGmjcghvasj0mJ4u51Rl9JsJ0D7ByOIlVKuRV9KB8gnl7Neg-_w/exec'
        const form = document.forms['submit-to-google-sheet']
        const msg = document.getElementById("msg")
      
        form.addEventListener('submit', e => {
          e.preventDefault()
          fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response =>{msg.innerHTML="review submitted successfully"
            setTimeout(function(){
                msg.innerHTML=""


            },5000)
            form.reset()
        })
            .catch(error => console.error('Error!', error.message))
     } )
      </script>
</body>
</html>