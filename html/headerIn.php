
<link href="./css/styles.css" rel="stylesheet">
<header class="p-3">
    <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" >
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary"> Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Posts</a></li>
            </ul>


            <div class="text-end">
                <p id = "DisplayUser"></p>
                <button type="button" class = "btn btn-outline-light me-2" id="logout">
                    Log Out
                </button>
            </div>
        </div>
    </div>
</header>
<div id = "slogans" style="height: 300px; background: linear-gradient(to bottom, #AFA7B6 , #9C9CB4);">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active glo" data-bs-interval="5000">
                <p class="d-block w-100 text-center slogan-tag h-70">Explore and Join Events Others Have Made!</p>
                <div class="carousel-caption d-none d-md-block">
                    <h5 class = "biggertitlefont">Find What Interests You!</h5>
                    <p class = "biggerfont">An Endless Selection of Events To Be Chosen, Make Your Mark!</p>
                </div>
            </div>
            <div class="carousel-item glo" data-bs-interval="5000">
                <button class="d-block w-100 text-center slogan-tag h-70" style="padding-bottom: 16px">Become An Organizer Now!</button>
                <div class="carousel-caption d-none d-md-block">
                    <h5 class = "biggertitlefont">So You Can Make Events As Well</h5>
                    <p class = "biggerfont">Just Click "Become An Organizer Now"</p>
                </div>
            </div>
            <div class="carousel-item glo" data-bs-interval="3000">
                <p class="d-block w-100 text-center slogan-tag h-70">Enjoy The Experience!</p>
                <div class="carousel-caption d-none d-md-block">
                    <h5 class = "biggertitlefont">Have Fun Interacting With New People!</h5>
                    <p class = "biggerfont">Feel Free To Review, Rate, and Participate on Events.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>





