<!DOCTYPE html>
<html lang="fr-ch">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg" href="img/favicon.svg">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css'>

    <!-- PWA  -->
    <meta name="theme-color" content="#303030"/>
    <link rel="apple-touch-icon" href="{{ asset('img/logoPWA.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    
<!-- mettre css et js -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
   @vite('resources/js/app.js')
    @yield('css')
    @yield('js')

    <title>
        @yield('title')
    </title>
</head>
<body>
    <nav id="navigationHeader" class="noir">
        <div class="navigationHeaderItem">
            <a href="/dashboard">
                <svg class="navigationIcons" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_31_161)">
                    <path d="M12.2648 5.78668H12.7358C14.2713 5.78668 15.5165 7.03191 15.5165 8.5674V10.921C15.5165 12.4565 14.2713 13.7017 12.7358 13.7017H12.2648C10.7294 13.7017 9.48413 12.4565 9.48413 10.921V8.5674C9.48413 7.03182 10.7288 5.78668 12.2648 5.78668Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M12.5 15.9286C15.6054 15.9286 17.9389 18.0492 17.9988 20.4692L17.2793 23.1263C17.2345 23.1443 17.1853 23.1637 17.1322 23.1844C16.8266 23.3031 16.39 23.4622 15.8709 23.6212C14.8225 23.9424 13.4807 24.25 12.2154 24.25C10.9578 24.25 9.7815 23.9455 8.90851 23.6324C8.47471 23.4768 8.12268 23.3215 7.88144 23.2065C7.84675 23.1899 7.81439 23.1742 7.78444 23.1595L7.00135 20.4626C7.06534 18.0446 9.39738 15.9286 12.5 15.9286Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M24.25 12.5C24.25 18.9893 18.9893 24.25 12.5 24.25C6.01065 24.25 0.75 18.9893 0.75 12.5C0.75 6.01065 6.01065 0.75 12.5 0.75C18.9893 0.75 24.25 6.01065 24.25 12.5Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_31_161">
                    <rect width="25" height="25" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
            </a>
            @can('isAdmin')
                <a href="/admin_dashboard">
                    <svg class="navigationIcons" viewBox="0 0 76 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M31.75 42.1667H2.58333C1.33333 42.1667 0.5 43 0.5 44.25V73.4167C0.5 74.6667 1.33333 75.5 2.58333 75.5H31.75C33 75.5 33.8333 74.6667 33.8333 73.4167V44.25C33.8333 43 33 42.1667 31.75 42.1667ZM29.6667 71.3333H4.66667V46.3333H29.6667V71.3333ZM31.75 0.5H2.58333C1.33333 0.5 0.5 1.33333 0.5 2.58333V31.75C0.5 33 1.33333 33.8333 2.58333 33.8333H31.75C33 33.8333 33.8333 33 33.8333 31.75V2.58333C33.8333 1.33333 33 0.5 31.75 0.5ZM29.6667 29.6667H4.66667V4.66667H29.6667V29.6667ZM73.4167 0.5H44.25C43 0.5 42.1667 1.33333 42.1667 2.58333V31.75C42.1667 33 43 33.8333 44.25 33.8333H73.4167C74.6667 33.8333 75.5 33 75.5 31.75V2.58333C75.5 1.33333 74.6667 0.5 73.4167 0.5ZM71.3333 29.6667H46.3333V4.66667H71.3333V29.6667ZM73.4167 56.75H60.9167V44.25C60.9167 43 60.0833 42.1667 58.8333 42.1667C57.5833 42.1667 56.75 43 56.75 44.25V56.75H44.25C43 56.75 42.1667 57.5833 42.1667 58.8333C42.1667 60.0833 43 60.9167 44.25 60.9167H56.75V73.4167C56.75 74.6667 57.5833 75.5 58.8333 75.5C60.0833 75.5 60.9167 74.6667 60.9167 73.4167V60.9167H73.4167C74.6667 60.9167 75.5 60.0833 75.5 58.8333C75.5 57.5833 74.6667 56.75 73.4167 56.75Z" fill="white"/>
                        </svg>
                        
                </a>
            @endcan
        </div>
        <div class="navigationHeaderItem">
            <a href="/">
                <svg width="91" height="33" viewBox="0 0 91 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_31_168)">
                    <path d="M0.518722 8.91922H3.08488C3.13997 8.91992 3.19439 8.93136 3.24501 8.95287C3.29564 8.97439 3.34149 9.00557 3.37994 9.04462C3.41839 9.08367 3.44869 9.12984 3.46911 9.18048C3.48953 9.23112 3.49967 9.28525 3.49895 9.33977V11.3644C4.4633 10.0299 5.74366 8.78442 8.00471 8.78442C10.1377 8.78442 11.6224 9.83312 12.4097 11.421C13.6137 9.83312 15.1856 8.78442 17.4303 8.78442C20.6557 8.78442 22.6062 10.8522 22.6062 14.5105V23.6468C22.6069 23.7564 22.5638 23.8619 22.4862 23.9402C22.4086 24.0185 22.3029 24.0632 22.1921 24.0646H19.6505C19.5397 24.0632 19.434 24.0185 19.3564 23.9402C19.2788 23.8619 19.2357 23.7564 19.2364 23.6468V15.5592C19.2364 13.1787 18.1467 11.9009 16.2398 11.9009C14.3901 11.9009 13.0689 13.2057 13.0689 15.6158V23.6468C13.0696 23.7564 13.0265 23.8619 12.9489 23.9402C12.8714 24.0185 12.7656 24.0632 12.6548 24.0646H10.086C9.97492 24.0632 9.86892 24.0186 9.7909 23.9404C9.71289 23.8621 9.66916 23.7567 9.66916 23.6468V15.5322C9.66916 13.2057 8.54954 11.9009 6.67259 11.9009C4.79565 11.9009 3.49895 13.3189 3.49895 15.6454V23.6468C3.49968 23.7564 3.45655 23.8619 3.37897 23.9402C3.30139 24.0185 3.19567 24.0632 3.08488 24.0646H0.518722C0.407932 24.0632 0.302209 24.0185 0.224631 23.9402C0.147053 23.8619 0.103921 23.7564 0.10465 23.6468V9.33977C0.10393 9.28525 0.114069 9.23112 0.13449 9.18048C0.15491 9.12984 0.185211 9.08367 0.223662 9.04462C0.262113 9.00557 0.307961 8.97439 0.358588 8.95287C0.409214 8.93136 0.463628 8.91992 0.518722 8.91922Z" fill="white"/>
                    <path d="M34.1919 23.6468V22.2207C33.1813 23.4419 31.6394 24.3774 29.3947 24.3774C26.5888 24.3774 24.1207 22.7598 24.1207 19.7539V19.6973C24.1207 16.3814 26.6733 14.7935 30.1139 14.7935C31.5017 14.7709 32.8834 14.9815 34.2001 15.4163V15.1467C34.2001 13.079 32.9089 11.944 30.5525 11.944C29.2346 11.9433 27.93 12.2056 26.7168 12.715C26.6643 12.7362 26.6079 12.7463 26.5511 12.7447C26.4944 12.7431 26.4387 12.7299 26.3874 12.7058C26.3362 12.6817 26.2905 12.6473 26.2534 12.6048C26.2164 12.5623 26.1886 12.5126 26.172 12.4589L25.5346 10.4747C25.5009 10.3747 25.5059 10.2658 25.5487 10.1692C25.5915 10.0725 25.6689 9.99507 25.7661 9.95174C27.4249 9.21118 29.2287 8.84293 31.0483 8.87339C35.426 8.87339 37.5563 11.1972 37.5563 15.1952V23.6468C37.5571 23.7546 37.5154 23.8585 37.4402 23.9365C37.3649 24.0145 37.262 24.0604 37.1531 24.0646H34.6169C34.5611 24.0653 34.5058 24.055 34.4541 24.0343C34.4023 24.0136 34.3553 23.9829 34.3158 23.944C34.2762 23.9051 34.2449 23.8588 34.2236 23.8077C34.2023 23.7567 34.1916 23.702 34.1919 23.6468ZM34.2764 17.7994C33.192 17.4027 32.0436 17.2045 30.8875 17.2144C28.7545 17.2144 27.4932 18.0933 27.4932 19.5383V19.5949C27.4932 21.0129 28.7545 21.8082 30.3536 21.8082C32.5983 21.8082 34.2818 20.5303 34.2818 18.6594L34.2764 17.7994Z" fill="white"/>
                    <path d="M90.8953 0.5H42.6641V32.5H90.8953V0.5Z" fill="#AF001E"/>
                    <path d="M53.9094 16.2547L53.6724 17.2441C53.6204 17.4123 53.5884 17.586 53.5771 17.7617C53.587 18.0154 53.6692 18.2612 53.8141 18.4707L56.6499 23.5147C56.731 23.7043 56.8727 23.8624 57.0533 23.9646C57.2339 24.0669 57.4434 24.1077 57.6497 24.0808H60.2485C60.5809 24.0808 60.9868 23.8705 60.6054 23.272L57.1267 17.573C58.2953 16.8424 59.6056 15.8045 59.6056 13.5292C59.6056 10.5826 57.9357 8.92999 54.2663 8.92999H48.9542C48.4775 8.92999 48.3358 9.09714 48.3358 9.56622V23.4446C48.3358 23.9163 48.4775 24.0808 48.9542 24.0808H51.1471C51.6239 24.0808 51.7655 23.9163 51.7655 23.4446V11.7256H54.0429C55.4731 11.7256 56.1623 12.2459 56.1623 13.5669C56.1623 14.7666 55.6175 15.144 55.0726 15.3812C54.3616 15.6643 54.1246 15.357 53.9094 16.2547Z" fill="white"/>
                    <path d="M65.4844 23.4446C65.4844 23.9163 65.6287 24.0808 66.1055 24.0808H68.2984C68.7724 24.0808 68.9168 23.9163 68.9168 23.4446V11.7984H72.9676C73.4443 11.7984 73.586 11.6312 73.586 11.1595V9.55542C73.586 9.08633 73.4443 8.91919 72.9676 8.91919H61.4472C60.9704 8.91919 60.826 9.08633 60.826 9.55542V11.1595C60.826 11.6312 60.9704 11.7984 61.4472 11.7984H65.4844V23.4446Z" fill="white"/>
                    <path d="M74.9699 21.6545L74.6838 23.4688C74.6375 23.822 74.8037 23.9648 75.1115 24.008C76.4813 24.1542 77.8582 24.2253 79.2359 24.221C83.0225 24.221 85.7739 22.9943 85.7739 19.5059C85.7739 17.4516 84.8694 15.9204 81.723 15.1197L79.9605 14.6695C78.7673 14.3649 78.2198 13.9874 78.2198 13.114C78.2198 11.89 79.3639 11.6528 80.4618 11.6528C81.9383 11.6528 83.4393 11.7714 84.0359 11.8173C84.6324 11.8631 84.8204 11.7957 84.9158 11.2781L85.2018 9.50959C85.2508 9.15643 85.0819 9.01355 84.7741 8.97041C83.3977 8.81669 82.0131 8.74557 80.6279 8.75744C76.697 8.75744 74.7901 10.4558 74.7901 13.1436C74.7901 15.5699 76.1222 17.0095 78.435 17.5999L80.1975 18.0474C81.6522 18.4248 82.2706 18.8562 82.2706 19.7458C82.2706 21.0668 81.3662 21.3013 79.1732 21.3013C78.1735 21.3013 76.4327 21.1611 75.8389 21.1126C75.245 21.0641 75.0652 21.1342 74.9699 21.6545Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_31_168">
                    <rect width="90.7907" height="32" fill="white" transform="translate(0.104614 0.5)"/>
                    </clipPath>
                    </defs>
                    </svg>
            </a>
        </div>
        <div class="navigationHeaderItem">
            <a href="/">
                <svg class="pointer navigationIcons" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.1708 22.559V15.3539H15.8229V22.559C15.8229 23.3515 16.4588 24 17.236 24H21.4751C22.2522 24 22.8881 23.3515 22.8881 22.559V12.4719H25.2902C25.9402 12.4719 26.2511 11.6506 25.7565 11.2183L13.9436 0.367457C13.4066 -0.122486 12.5871 -0.122486 12.0501 0.367457L0.23718 11.2183C-0.243251 11.6506 0.0534859 12.4719 0.703481 12.4719H3.10564V22.559C3.10564 23.3515 3.7415 24 4.51867 24H8.75776C9.53493 24 10.1708 23.3515 10.1708 22.559Z" fill="white"/>
                    </svg>  
            </a>
        </div>
    </nav>

    <div id="notification-container"></div>

    <img class="logoC3" src="img/RTSCouleur3.png" alt="logo couleur 3">
        @yield("content")
    <footer id="footer">
        <div class="footerNav">
            <a class="footerLink FontMonserrat" href="/dashboard">Mon compte</a>
        </div>
        <div class="footerNav">
            <a class="footerLink FontMonserrat" href="#top">Retour en haut</a>
        </div>
        <div class="footerNav footerNavLast">
            <a class="footerIcons" href="https://www.youtube.com/@Couleur3" target="blank">
                <svg class="footerIconsItem" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="27" height="27" rx="8" fill="#6E6C6F"/>
                <rect x="3" y="3" width="21" height="21" rx="2.30928" fill="#6E6C6F"/>
                <path d="M22.1017 8.98712C21.8922 8.17993 21.277 7.5456 20.4943 7.32952C19.0754 6.9375 13.3895 6.9375 13.3895 6.9375C13.3895 6.9375 7.70365 6.9375 6.28629 7.32952C5.50353 7.5456 4.8884 8.17993 4.67886 8.98712C4.29871 10.4487 4.29871 13.5 4.29871 13.5C4.29871 13.5 4.29871 16.5513 4.67886 18.0129C4.8884 18.8201 5.50353 19.4544 6.28629 19.6705C7.70365 20.0625 13.3895 20.0625 13.3895 20.0625C13.3895 20.0625 19.0754 20.0625 20.4928 19.6705C21.2755 19.4544 21.8907 18.8201 22.1002 18.0129C22.4804 16.5513 22.4804 13.5 22.4804 13.5C22.4804 13.5 22.4804 10.4487 22.1002 8.98712H22.1017ZM11.5711 16.3121V10.6879L16.2946 13.5L11.5711 16.3121Z" fill="white"/>
                </svg>
            </a>
            <a class="footerIcons" href="https://www.instagram.com/couleur3/" target="blank">
                <svg class="footerIconsItem" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="27" height="27" rx="8" fill="#6E6C6F"/>
                <rect x="3" y="3" width="21" height="21" rx="2.4375" fill="#6E6C6F"/>
                <rect x="5.59741" y="5.625" width="15.5843" height="15.7501" rx="3.65625" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3896 17.6087C15.6349 17.6087 17.455 15.7691 17.455 13.4999C17.455 11.2308 15.6349 9.39124 13.3896 9.39124C11.1443 9.39124 9.3241 11.2308 9.3241 13.4999C9.3241 15.7691 11.1443 17.6087 13.3896 17.6087Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1327 9.73368C18.694 9.73368 19.1491 9.27379 19.1491 8.7065C19.1491 8.1392 18.694 7.67932 18.1327 7.67932C17.5714 7.67932 17.1163 8.1392 17.1163 8.7065C17.1163 9.27379 17.5714 9.73368 18.1327 9.73368Z" stroke="white" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                    
            </a>
            <a class="footerIcons" href="https://twitter.com/Couleur3" target="blank">
                <svg class="footerIconsItem" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="27" height="27" rx="8" fill="#6E6C6F"/>
                <rect x="3" y="3" width="21" height="21" rx="2.30928" fill="#6E6C6F"/>
                <g clip-path="url(#clip0_0_1)">
                <path d="M13.3895 4.96875C8.72725 4.96875 4.948 8.78819 4.948 13.5C4.948 18.2118 8.72725 22.0312 13.3895 22.0312C18.0517 22.0312 21.831 18.2118 21.831 13.5C21.831 8.78819 18.0517 4.96875 13.3895 4.96875ZM17.6313 11.8833C17.6355 11.9686 17.6355 12.0582 17.6355 12.1478C17.6355 14.865 15.5885 18.0002 11.8447 18.0002C10.6966 18.0002 9.62458 17.659 8.734 17.0703C8.89439 17.0917 9.05478 17.1002 9.21939 17.1002C10.1733 17.1002 11.0512 16.7717 11.7476 16.2215C10.857 16.2044 10.1057 15.6115 9.84828 14.7925C9.9749 14.8181 10.1015 14.8309 10.2324 14.8309C10.4181 14.8309 10.5996 14.8053 10.7684 14.7584C9.83561 14.5664 9.13497 13.7389 9.13497 12.7407V12.7151C9.40932 12.8687 9.72165 12.9625 10.0551 12.9711C9.5064 12.6042 9.14763 11.9729 9.14763 11.2605C9.14763 10.8852 9.24893 10.5311 9.42198 10.2283C10.4265 11.4738 11.9249 12.2928 13.6174 12.3781C13.5794 12.2288 13.5625 12.071 13.5625 11.9089C13.5625 10.7743 14.4742 9.85289 15.5969 9.85289C16.1836 9.85289 16.7112 10.1003 17.0826 10.5013C17.5469 10.4074 17.9816 10.2368 18.3742 10.0022C18.2222 10.4842 17.9014 10.8852 17.4794 11.1411C17.893 11.0899 18.2855 10.979 18.6485 10.8169C18.3742 11.2307 18.0281 11.5933 17.6313 11.8833Z" fill="white"/>
                </g>
                <defs>
                <clipPath id="clip0_0_1">
                <rect width="16.883" height="17.0625" fill="white" transform="translate(4.948 4.96875)"/>
                </clipPath>
                </defs>
                </svg>                    
            </a>
            <a class="footerIcons" href="https://www.facebook.com/couleur3" target="blank">
                <svg class="footerIconsItem" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="27" height="27" rx="8" fill="#6E6C6F"/>
                <rect x="3" y="3" width="21" height="21" rx="2.30928" fill="#6E6C6F"/>
                <g clip-path="url(#clip0_0_1)">
                <path d="M21.831 13.5521C21.831 8.81166 18.0516 4.96875 13.3895 4.96875C8.72737 4.96875 4.948 8.81166 4.948 13.5521C4.948 17.8363 8.03491 21.3873 12.0705 22.0312V16.0333H9.92715V13.5521H12.0705V11.6611C12.0705 9.5099 13.3308 8.32164 15.259 8.32164C16.1826 8.32164 17.1486 8.48928 17.1486 8.48928V10.6016H16.0842C15.0356 10.6016 14.7085 11.2633 14.7085 11.9421V13.5521H17.0497L16.6754 16.0333H14.7085V22.0312C18.744 21.3873 21.831 17.8365 21.831 13.5521Z" fill="white"/>
                </g>
                <defs>
                <clipPath id="clip0_0_1">
                <rect width="16.883" height="17.0625" fill="white" transform="translate(4.948 4.96875)"/>
                </clipPath>
                </defs>
                </svg>                    
            </a>
        </div>
    </footer>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }

        // NOTIFICATIONS BY RYAN MORR CODEPEN
        var notification;
        var container = document.querySelector('#notification-container');
        var visible = false;
        var queue = [];

        function createNotification() {
            notification = document.createElement('div');
            var btn = document.createElement('button');
            var title = document.createElement('div');
            var msg = document.createElement('div');
            btn.className = 'notification-close';
            title.className = 'notification-title';
            msg.className = 'notification-message';
            btn.addEventListener('click', hideNotification, false);
            notification.addEventListener('animationend', hideNotification, false);
            notification.addEventListener('webkitAnimationEnd', hideNotification, false);
            notification.appendChild(btn);
            notification.appendChild(title);
            notification.appendChild(msg);
        }

        function updateNotification(type, title, message) {
            notification.className = 'notification notification-' + type;
            notification.querySelector('.notification-title').innerHTML = title;
            notification.querySelector('.notification-message').innerHTML = message;
        }

        function showNotification(type, title, message) {
            if (visible) {
                queue.push([type, title, message]);
                return;
            }
            if (!notification) {
                createNotification();
            }
            updateNotification(type, title, message);
            container.appendChild(notification);
            visible = true;
        }

        function hideNotification() {
            if (visible) {
                visible = false;
                container.removeChild(notification);
                if (queue.length) {
                    showNotification.apply(null, queue.shift());
                }
            } 
        }
    </script>

    @if (session()->has('success'))
        <script>
            showNotification.bind(null, 'success', 'Bravo !', "{{ session()->get('success') }}")();
        </script>
        {{ session()->forget('success') }}
    @elseif (session()->has('error'))
        <script>
            showNotification.bind(null, 'error', 'Aïe !', "{{ session()->get('error') }}")();
        </script>
        {{ session()->forget('error') }}
    @endif
</body>
</html>