<div class="sidebar-module">
    <x-layout-heading heading="Stay connected" />
    <style>

    ul.social-share li a.facebook {
        background: #436feb;
    }

    ul.social-share li a {
        display: inline-block;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        float: left;
        width: 40px;
        height: 40px;
        color: #ffffff;
        text-align: center;
        position: relative;
        line-height: 40px;
        font-size: 14px;
        margin-right: 16px;
    }
    ul.social-share li a:after {
        content: '';
        position: absolute;
        top: 50%;
        margin-top: -4px;
        left: 100%;
        width: 0;
        height: 0;
    }

    /* Facebook */
    ul.social-share li a.facebook {
        background: #436feb;
    }

    ul.social-share li a.facebook:after {
        border: 4px solid #436feb;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-top-color: transparent;
    }

    /* Twitter */
    ul.social-share li a.twitter {
        background: #1da1f2;
    }

    ul.social-share li a.twitter:after {
        border: 4px solid #1da1f2;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-top-color: transparent;
    }

    /* Linkedin */
    ul.social-share li a.linkedin {
        background: #0a66c2;
    }

    ul.social-share li a.linkedin:after {
        border: 4px solid #0a66c2;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-top-color: transparent;
    }

    /* Instagram */
    ul.social-share li a.instagram {
        background: #c32aa3;
    }

    ul.social-share li a.instagram:after {
        border: 4px solid #c32aa3;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-top-color: transparent;
    }

    /* Xing */
    ul.social-share li a.xing {
        background: #126567;
    }

    ul.social-share li a.xing:after {
        border: 4px solid #126567;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-top-color: transparent;
    }

    /* Youtube */
    ul.social-share li a.youtube {
        background: #ff0000;
    }

    ul.social-share li a.youtube:after {
        border: 4px solid #ff0000;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-top-color: transparent;
    }



    </style>

    <ul class="social-share grid grid-cols-2 gap-4 text-gray-600 text-xs">
        <li class="bg-zinc-50 flex items-center">
            <a href="https://www.facebook.com/Matchbird-GmbH-1050852385302281/" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <div>
                <span class="block text-gray-600 font-bold">11.644</span>
                <span class="font-light">Followers</span>
            </div>
        </li>
        <li class="bg-zinc-50 flex items-center">
            <a href="https://www.instagram.com/matchbird.gmbh/" class="instagram"><i class="fa-brands fa-instagram"></i></a>
            <div>
                <span class="block text-gray-600 font-bold">3.490</span>
                <span class="font-light">Followers</span>
            </div>
        </li>
        <li class="bg-zinc-50 flex items-center">
            <a href="https://twitter.com/matchbirdgmbh/" class="twitter"><i class="fa-brands fa-twitter"></i></a>
            <div>
                <span class="block text-gray-600 font-bold">5.326</span>
                <span class="font-light">Followers</span>
            </div>
        </li>
        <li class="bg-zinc-50 flex items-center">
            <a href="https://www.linkedin.com/company/matchbird/" class="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
            <div>
                <span class="block text-gray-600 font-bold">1.983</span>
                <span class="font-light">Connections</span>
            </div>
        </li>
        
        <li class="bg-zinc-50 flex items-center">
            <a href="https://www.youtube.com/channel/UC4GnbbnwvAnl80_cVXJRuMA" class="youtube"><i class="fa-brands fa-youtube"></i></a>
            <div>
                <span class="block text-gray-600 font-bold">4.387</span>
                <span class="font-light">Subscribers</span>
            </div>
        </li>
        <li class="bg-zinc-50 flex items-center">
            <a href="https://www.xing.com/pages/matchbirdgmbh" class="xing"><i class="fa-brands fa-xing"></i></a>
            <div>
                <span class="block text-gray-600 font-bold">897</span>
                <span class="font-light">Followers</span>
            </div>
        </li>  
    </ul>
</div>