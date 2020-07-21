<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta
      http-equiv="Content-Type"
      content="text/html; charset=utf-8"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1"
    />
    <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/markup/dest/css/app.min.css" />

    <link
      id="favicon"
      rel="shortcut icon"
      href="https://ostinred.github.io/favicon/favicon.ico"
      type="image/x-icon"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="https://ostinred.github.io/favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="https://ostinred.github.io/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="https://ostinred.github.io/favicon/favicon-16x16.png"
    />
    <link
      rel="manifest"
      href="https://ostinred.github.io/favicon/site.webmanifest"
    />
    <link
      rel="mask-icon"
      href="https://ostinred.github.io/favicon/safari-pinned-tab.svg"
      color="#5bbad5"
    />
    <link
      rel="shortcut icon"
      href="https://ostinred.github.io/favicon/favicon.ico"
    />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta
      name="msapplication-config"
      content="https://ostinred.github.io/favicon/browserconfig.xml"
    />
    <meta name="theme-color" content="#ffffff" />

    <style>
      #preloading {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 10000;
        transition: 0.3s ease-out;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      #preloading img {
        width: 125px;
        height: 125px;
        transform: translateY(-50%);
      }

      @media screen and (min-width: 760px) {
        #preloading img {
          width: 150px;
          height: 150px;
        }
      }

      @media screen and (min-width: 1200px) {
        #preloading img {
          width: 200px;
          height: 200px;
          transform: translateY(-40%);
        }
      }

      .is-hidden {
        opacity: 0;
      }
    </style>
    <?php wp_head();?>
  </head>
  <body class="overflow-hidden">
    <div id="preloading">
      <img src="<?=get_stylesheet_directory_uri()?>/img/loader.gif" alt="" />
    </div>
    <div id="splashVideo" class="splash-video">
      <?php $detect = new Mobile_Detect();?>
      <?php if($detect->isMobile()):?>
        <video type="video/mp4" muted class="splash_phone">
          <source src="<?=get_stylesheet_directory_uri()?>/markup/dest/video/splash_phone.mp4" />
        </video>
      <?php elseif($detect->isTablet()):?>
        <video type="video/mp4" muted class="splash_tablet">
          <source src="<?=get_stylesheet_directory_uri()?>/markup/dest/video/splash_tablet.mp4" />
        </video>
      <?php else:?>
        <video type="video/mp4" muted class="splash_laptop">
          <source src="<?=get_stylesheet_directory_uri()?>/markup/dest/video/splash_laptop.mp4" />
        </video>
      <?php endif?>
    </div>
    <header role="header" class="is-header">
      <!-- logo -->
      <a role="link" href="/" class="is-logo">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          width="48px"
          height="46px"
          viewBox="0 0 48 46"
          version="1.1"
          class="is-logo__icon"
        >
          <g
            stroke="none"
            stroke-width="1"
            fill="none"
            fill-rule="evenodd"
          >
            <g transform="translate(-23.000000, -17.000000)">
              <g transform="translate(23.000000, 17.000000)">
                <polygon
                  points="0 45.8231429 33.2405714 45.8231429 9.608 29.1814286"
                />
                <g transform="translate(15.000000, 0.108857)">
                  <path
                    d="M31.0089143,34.3300857 L11.2906286,0.176942857 L0.754628571,18.4260857 L24.5789143,45.7095143 C30.3366286,45.6060857 33.9057714,39.3478 31.0089143,34.3300857"
                    id="Fill-2"
                  />
                </g>
              </g>
            </g>
          </g>
        </svg>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          width="118px"
          height="15px"
          viewBox="0 0 118 15"
          version="1.1"
          class="is-logo__name"
        >
          <defs>
            <polygon
              id="path-1"
              points="0 45.7142857 171.428571 45.7142857 171.428571 0.176857143 0 0.176857143"
            />
          </defs>
          <g
            id="Welcome"
            stroke="none"
            stroke-width="1"
            fill="none"
            fill-rule="evenodd"
          >
            <g
              id="Creative_Hover"
              transform="translate(-77.000000, -32.000000)"
            >
              <g
                id="Group-16"
                transform="translate(23.000000, 17.000000)"
              >
                <g
                  id="AJ_Name"
                  transform="translate(0.000000, 0.108857)"
                >
                  <path
                    d="M91.2028571,21.8180857 C91.656,21.8180857 92.0128571,21.7023714 92.2725714,21.4686571 C92.532,21.2360857 92.6628571,20.8932286 92.6628571,20.4398 L92.6628571,19.5600857 C92.6628571,19.1069429 92.532,18.7640857 92.2725714,18.5303714 C92.0128571,18.2966571 91.656,18.1809429 91.2028571,18.1809429 L88.0051429,18.1809429 L88.0051429,21.8180857 L91.2028571,21.8180857 Z M88.0051429,29.4938 L84.9665714,29.4938 L84.9665714,15.5418 L91.5828571,15.5418 C92.2225714,15.5418 92.8028571,15.6495143 93.3217143,15.8615143 C93.8417143,16.0758 94.2848571,16.3789429 94.6508571,16.7720857 C95.018,17.1649429 95.3008571,17.6338 95.5008571,18.1809429 C95.7002857,18.7278 95.8002857,19.3329429 95.8002857,20.0003714 C95.8002857,20.9466571 95.59,21.7718 95.1708571,22.4780857 C94.7511429,23.1852286 94.1142857,23.6969429 93.2622857,24.0175143 L96.0005714,29.4938 L92.622,29.4938 L90.1842857,24.3772286 L88.0051429,24.3772286 L88.0051429,29.4938 Z"
                    id="Fill-4"
                  />
                  <mask id="mask-2" fill="white">
                    <use xlink:href="#path-1" />
                  </mask>
                  <g id="Clip-7" />
                  <polygon
                    id="Fill-6"
                    mask="url(#mask-2)"
                    points="99.744 29.4945714 102.702571 29.4945714 102.702571 15.5417143 99.744 15.5417143"
                  />
                  <polygon
                    id="Fill-8"
                    mask="url(#mask-2)"
                    points="109.824771 29.4941429 105.327343 15.5421429 108.405629 15.5421429 110.483914 22.2381429 111.583057 26.6161429 111.643343 26.6161429 112.702771 22.2381429 114.781914 15.5421429 117.759914 15.5421429 113.223057 29.4941429"
                  />
                  <polygon
                    id="Fill-9"
                    mask="url(#mask-2)"
                    points="123.716229 29.4941429 119.2188 15.5421429 122.297086 15.5421429 124.375371 22.2381429 125.474514 26.6161429 125.5348 26.6161429 126.594229 22.2381429 128.673371 15.5421429 131.651371 15.5421429 127.114229 29.4941429"
                  />
                  <polygon
                    id="Fill-10"
                    mask="url(#mask-2)"
                    points="134.269943 29.4941429 134.269943 15.5421429 143.764229 15.5421429 143.764229 18.2404286 137.308229 18.2404286 137.308229 21.0787143 142.8448 21.0787143 142.8448 23.7775714 137.308229 23.7775714 137.308229 26.7958571 143.764229 26.7958571 143.764229 29.4941429"
                  />
                  <path
                    d="M153.438629,21.8180857 C153.891771,21.8180857 154.248629,21.7023714 154.508343,21.4686571 C154.767771,21.2360857 154.897486,20.8932286 154.897486,20.4398 L154.897486,19.5600857 C154.897486,19.1069429 154.767771,18.7640857 154.508343,18.5303714 C154.248629,18.2966571 153.891771,18.1809429 153.438629,18.1809429 L150.240629,18.1809429 L150.240629,21.8180857 L153.438629,21.8180857 Z M150.240629,29.4938 L147.202343,29.4938 L147.202343,15.5418 L153.818629,15.5418 C154.458057,15.5418 155.037486,15.6495143 155.557486,15.8615143 C156.077486,16.0758 156.519771,16.3789429 156.886629,16.7720857 C157.252914,17.1649429 157.535486,17.6338 157.736629,18.1809429 C157.936057,18.7278 158.036057,19.3329429 158.036057,20.0003714 C158.036057,20.9466571 157.825486,21.7718 157.405771,22.4780857 C156.986629,23.1852286 156.350057,23.6969429 155.4972,24.0175143 L158.235486,29.4938 L154.857771,29.4938 L152.418914,24.3772286 L150.240629,24.3772286 L150.240629,29.4938 Z"
                    id="Fill-11"
                    mask="url(#mask-2)"
                  />
                  <path
                    d="M165.991343,29.7338286 C164.765057,29.7338286 163.725914,29.5235429 162.873057,29.1035429 C162.020486,28.6826857 161.294771,28.1395429 160.693914,27.4732571 L162.693343,25.4506857 C163.638771,26.5084 164.805057,27.0358286 166.191343,27.0358286 C166.937914,27.0358286 167.4902,26.8835429 167.849629,26.5806857 C168.210486,26.2764 168.3902,25.8741143 168.3902,25.3718286 C168.3902,24.9892571 168.282771,24.6684 168.0702,24.4115429 C167.857057,24.1541143 167.423343,23.9786857 166.771057,23.8858286 L165.391343,23.7081143 C163.9122,23.5209714 162.829629,23.0738286 162.143629,22.3678286 C161.456771,21.6595429 161.113914,20.7186857 161.113914,19.5452571 C161.113914,18.9178286 161.234486,18.3449714 161.473343,17.8238286 C161.713629,17.3041143 162.056486,16.8564 162.503343,16.4838286 C162.949343,16.1101143 163.4962,15.8192571 164.141914,15.6132571 C164.7882,15.4058286 165.525057,15.3026857 166.351057,15.3026857 C167.402771,15.3026857 168.329914,15.4695429 169.129629,15.8032571 C169.928771,16.1361143 170.614771,16.6235429 171.188486,17.2641143 L169.169629,19.3061143 C168.835914,18.9244 168.432771,18.6109714 167.9602,18.3672571 C167.487343,18.1232571 166.8902,18.0012571 166.171057,18.0012571 C165.491629,18.0012571 164.984771,18.1198286 164.651914,18.3569714 C164.319057,18.5944 164.1522,18.9244 164.1522,19.3461143 C164.1522,19.8215429 164.2822,20.1635429 164.542486,20.3749714 C164.8022,20.5861143 165.224486,20.7384 165.811343,20.8301143 L167.190486,21.0504 C168.6302,21.2766857 169.695343,21.7206857 170.388771,22.3806857 C171.081629,23.0406857 171.428486,23.9786857 171.428486,25.1929714 C171.428486,25.8586857 171.307914,26.4721143 171.068771,27.0329714 C170.829057,27.5926857 170.478486,28.0738286 170.018771,28.4744 C169.558771,28.8735429 168.988771,29.1841143 168.309343,29.4049714 C167.629914,29.6244 166.857057,29.7338286 165.991343,29.7338286"
                    id="Fill-12"
                    mask="url(#mask-2)"
                  />
                  <path
                    d="M61.2265714,18.2851429 L61.1265714,18.2851429 L59.584,23.5934286 L62.7894286,23.5934286 L61.2265714,18.2851429 Z M64.5308571,29.5025714 L63.53,26.1777143 L58.8631429,26.1777143 L57.862,29.5025714 L54.7771429,29.5025714 L59.384,15.522 L63.15,15.522 L67.6965714,29.5025714 L64.5308571,29.5025714 Z"
                    id="Fill-13"
                    mask="url(#mask-2)"
                  />
                  <path
                    d="M77.5354286,15.5220286 L77.5354286,15.5214571 L73.6582857,15.5214571 L73.6574286,15.5220286 L71.3105714,15.5220286 L71.3502857,18.0346 L74.8031429,18.0346 L74.8031429,25.2606 C74.8031429,26.2143143 74.0274286,26.9903143 73.0737143,26.9903143 C72.12,26.9903143 71.3442857,26.2143143 71.3442857,25.2606 L71.3442857,23.5848857 L68.6117143,23.5848857 L68.6117143,23.5851714 L68.6042857,23.5851714 L68.6042857,23.6374571 L68.6117143,23.6266 L68.6117143,25.2606 C68.6117143,27.7208857 70.6131429,29.7226 73.0737143,29.7226 C75.534,29.7226 77.5354286,27.7208857 77.5354286,25.2606 L77.5354286,15.5431714 L77.5517143,15.5220286 L77.5354286,15.5220286 Z"
                    id="Fill-14"
                    mask="url(#mask-2)"
                  />
                </g>
              </g>
            </g>
          </g>
        </svg>
      </a>
      <!-- end of logo -->

      <!-- navigation button -->
      <div id="navBtn" class="navigation-btn__wrapper">
        <button class="navigation-btn"></button>
      </div>
      <!-- end of navigation button -->

      <!-- navigation -->
      <nav role="navigation" class="is-navigation">
        <?php wp_nav_menu([
              'theme_location' => 'header-menu',
              "menu_class" => "is-navigation-list",
              "container" => null,
        ]) ?>
        <ul role="list" class="socials">
          <li role="listitem">
            <a
              href="<?=get_field('linkedin_url','option') ?>"
              role="link"
              target="_blank"
              class="social-link"
            >
              <i class="icon-linkedin"></i>
            </a>
          </li>
          <li role="listitem">
            <a
              href="<?=get_field('instagram_url','option') ?>"
              role="link"
              target="_blank"
              class="social-link"
            >
              <i class="icon-instagram"></i>
            </a>
          </li>
          <li role="listitem">
            <a
              href="<?=get_field('vimeo_url','option') ?>"
              role="link"
              target="_blank"
              class="social-link"
            >
              <i class="icon-vimeo"></i>
            </a>
          </li>
          <li role="listitem">
            <a
              href="<?=get_field('500px_url','option') ?>"
              role="link"
              target="_blank"
              class="social-link"
            >
              <i class="icon-500px"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- end of navigation -->
    </header>
