<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
<script src="https://kit.fontawesome.com/63574fddfe.js" crossorigin="anonymous"></script>
<footer>
    <div class="container">
        <div id="logo">
            <h1><a href="/home">{{ config('app.name', 'Laravel') }}</a></h1>
        </div>
        <div id="address">
            <p>Address: {{ config('information.address') }}</p>
        </div>
        <div id="contact">
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </div>
</footer>