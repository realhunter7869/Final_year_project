@if(!\Illuminate\Support\Facades\Auth::check())
    <script>window.location = "/login";</script>
@else
    <!DOCTYPE html>


    <html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
          data-assets-path="../assets/" data-template="vertical-menu-template-free">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

        <title>Issues</title>

        <meta name="description" content=""/>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico"/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"/>

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css"/>

        <!-- Core CSS -->
        <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css"/>
        <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
        <link rel="stylesheet" href="../assets/css/demo.css"/>

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>

        <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css"/>

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="../assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="../assets/js/config.js"></script>
        <style>.filterable {
                margin-top: 15px
            }

            .filterable .panel-heading .pull-right {
                margin-top: -20px
            }

            .filterable .filters input[disabled] {
                background-color: transparent;
                border: none;
                cursor: auto;
                box-shadow: none;
                padding: 0;
                height: auto
            }

            .filterable .filters input[disabled]::-webkit-input-placeholder {
                color: #333
            }

            .filterable .filters input[disabled]::-moz-placeholder {
                color: #333
            }

            .filterable .filters input[disabled]:-ms-input-placeholder {
                color: #333
            }
        </style>
        <style>

            .dropdown {
                position: relative;
                font-size: 14px;
                color: #333;

            .dropdown-list {
                padding: 12px;
                background: #fff;
                position: absolute;
                top: 30px;
                left: 2px;
                right: 2px;
                transform-origin: 50% 0;
                transform: scale(1, 0);
                transition: transform .15s ease-in-out .15s;
                max-height: 66vh;
                overflow-y: scroll;
            }

            .dropdown-option {
                display: block;
                padding: 8px 12px;
                opacity: 0;
                transition: opacity .15s ease-in-out;
            }

            .dropdown-label {
                display: block;
                height: 30px;
                background: #fff;
                padding: 6px 12px;
                line-height: 1;
                cursor: pointer;

            &:before {
                 content: '▼';
                 float: right;
             }
            }

            &.on {
            .dropdown-list {
                transform: scale(1, 1);
                transition-delay: 0s;

            .dropdown-option {
                opacity: 1;
                transition-delay: .2s;
            }
            }

            .dropdown-label:before {
                content: '▲';
            }
            }

            [type="checkbox"] {
                position: relative;
                top: -1px;
                margin-right: 4px;
            }
            }
        </style>
    </head>

    <body>
    @php
        $user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $user_response = \Illuminate\Support\Facades\Http::get('http://localhost:8001/api/user/' . $user_id);
        $user = $user_response["data"];

        $issue_response = \Illuminate\Support\Facades\Http::get('http://localhost:8001/api/userIssues/' . $user_id);
        $issues = $issue_response["data"];

        $tags_response = \Illuminate\Support\Facades\Http::get('http://localhost:8001/api/allTags');
        $tags = $tags_response["data"];

        $orgs = $user["organizations"];

    @endphp
        <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                   xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"></path>
                  <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"></path>
                  <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"></path>
                  <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"></path>
                </defs>
                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                    <g id="Icon" transform="translate(27.000000, 15.000000)">
                      <g id="Mask" transform="translate(0.000000, 8.000000)">
                        <mask id="mask-2" fill="white">
                          <use xlink:href="#path-1"></use>
                        </mask>
                        <use fill="#696cff" xlink:href="#path-1"></use>
                        <g id="Path-3" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-3"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                        </g>
                        <g id="Path-4" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-4"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                        </g>
                      </g>
                      <g id="Triangle"
                         transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                        <use fill="#696cff" xlink:href="#path-5"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">User</span>
                    </a>

                    <a href="javascript:void(0);"
                       class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="/user/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="/user/issues" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-error"></i>
                            <div data-i18n="Analytics">Issues</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/user/organization" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user me-2"></i>
                            <div data-i18n="Analytics">Organization</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{route('logout')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                            <div data-i18n="Analytics">Log Out</div>
                        </a>
                    </li>
                    <!-- Layouts -->


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"
                     style="margin:15px;">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">

                            <!-- Basic Bootstrap Table -->
                            <div class="card">

                                <h5 class="card-header">Table 
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter"><span class="tf-icons bx bx-user-plus"></span>&nbsp;
                                        Add Issues
                                    </button>
                                </h5>


                                <div class="card-body">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="col-lg-4 col-md-6">
                                            <div class="mt-3">

                                                <script>
                                                    function getCookie(name) {
                                                        let cookieValue = null;
                                                        if (document.cookie && document.cookie !== '') {
                                                            const cookies = document.cookie.split(';');
                                                            for (let i = 0; i < cookies.length; i++) {
                                                                const cookie = cookies[i].trim();
                                                                // Does this cookie string begin with the name we want?
                                                                if (cookie.substring(0, name.length + 1) === (name + '=')) {
                                                                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        return cookieValue;
                                                    }

                                                    const csrftoken = getCookie('csrftoken');


                                                </script>

                                                <!-- Modal -->
                                                <form method="post">
                                                    @csrf
                                                <div class="modal fade" id="modalCenter" tabindex="-1"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalCenterTitle">Add
                                                                    Issue</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="nameWithTitle" class="form-label">Title</label>
                                                                        <input type="text" id="nameWithTitle"
                                                                               class="form-control"
                                                                               name="title"
                                                                               placeholder="Enter Title"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-2">
                                                                    <div class="col mb-0">
                                                                        <label for="emailWithTitle" class="form-label">Organization</label>
{{--                                                                        <input type="text" id="emailWithTitle"--}}
{{--                                                                               class="form-control"--}}
{{--                                                                               placeholder="organization"/>--}}
                                                                        <select
                                                                            class="form-control"
                                                                            list="datalistOptions4"
                                                                            id="exampleDataList"
                                                                            placeholder="Type to search..."
                                                                            name="organization_id">
                                                                            @foreach ($orgs as $org)
                                                                                <option value='{{$org["id"]}}'>{{$org["name"]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                               for="basic-default-message">Description</label>
                                                                        <textarea
                                                                            id="basic-default-message"
                                                                            class="form-control"
                                                                            placeholder="Add some info about your isssue"
                                                                            name="description"
                                                                        ></textarea>
                                                                        <div class="modal-footer">
                                                                            <button onclick="get_tags()" type="button"
                                                                                    class="btn btn-primary">Get tag
                                                                                suggestions
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div id="tag-display-div" hidden>
                                                                        <p>These are some suggestions for tags. you may copy and paste them in the next box.</p>
                                                                        <p id="tag-display-para"></p>
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <label for="dobWithTitle" class="form-label">
                                                                            Tags</label>
{{--                                                                        <input type="text" id="dobWithTitle"--}}
{{--                                                                               class="form-control"--}}
{{--                                                                               placeholder="add tags"/>--}}
                                                                        <div class="dropdown form-select placement-dropdown" data-control="checkbox-dropdown">
                                                                            <label class="dropdown-label">Select</label>
                                                                            <div class="dropdown-list">
                                                                                <a href="#" data-toggle="check-all" class="dropdown-option">
                                                                                    Check All
                                                                                </a>
                                                                                @php
                                                                                    foreach ($tags as $tag) {
                                                                                @endphp
                                                                                <label class="dropdown-option">
                                                                                    <input type="checkbox" name="dropdown-group[]" value="{{$tag["id"]}}" />
                                                                                    {{$tag["name"]}}
                                                                                </label>
                                                                                @php
                                                                                    }
                                                                                @endphp

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                        data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="submit" name="addissue" class="btn btn-primary">Add
                                                                    Issues
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive text-nowrap">
                                            <script
                                                src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                            <div class="panel panel-primary filterable">
                                                <table class="table">
                                                    <thead>
                                                    <tr class="filters">
                                                        <th><label for="exampleDataList" class="form-label">ID</label>
                                                            <input type="text" placeholder="ID" id="dobWithTitle"
                                                                   class="form-control" list="datalistOptions0">
                                                            <datalist id="datalistOptions0">
                                                                @php
                                                                    $id_dropdown = array();
                                                                    foreach ($issues as $issue) {
                                                                      if (!in_array($issue["id"], $id_dropdown)){
                                                                        array_push($id_dropdown, $issue["id"]);
                                                                      }
                                                                    }
                                                                @endphp
                                                                @foreach ($id_dropdown as $iddd)
                                                                    <option value='{{$iddd}}'></option>
                                                                @endforeach
                                                            </datalist>
                                                        </th>
                                                        <th><label for="exampleDataList"
                                                                   class="form-label">Title</label>
                                                            <input type="text" placeholder="Title" id="dobWithTitle"
                                                                   class="form-control" list="datalistOptions1">
                                                            <datalist id="datalistOptions1">
                                                                @php
                                                                    $title_dropdown = array();
                                                                    foreach ($issues as $issue) {
                                                                      if (!in_array($issue["title"], $title_dropdown)){
                                                                        array_push($title_dropdown, $issue["title"]);
                                                                      }
                                                                    }
                                                                @endphp
                                                                @foreach ($title_dropdown as $titledd)
                                                                    <option value='{{$titledd}}'></option>
                                                                @endforeach
                                                            </datalist>
                                                        </th>
                                                        <th><label for="exampleDataList" class="form-label">Tags</label>
                                                            <input type="text" placeholder="Tags" id="dobWithTitle"
                                                                   class="form-control" list="datalistOptions2">
                                                            <datalist id="datalistOptions2">
                                                                @php
                                                                    $tag_dropdown = array();
                                                                    foreach ($issues as $issue) {
                                                                      foreach ($issue["tags"] as $tag) {
                                                                        if (!in_array($tag["name"], $tag_dropdown)){
                                                                          array_push($tag_dropdown, $tag["name"]);
                                                                        }
                                                                      }
                                                                    }
                                                                @endphp
                                                                @foreach ($tag_dropdown as $tagdd)
                                                                    echo "
                                                                    <option value='{{$tagdd}}'></option>";
                                                                @endforeach
                                                            </datalist>
                                                        </th>
                                                        <th><label for="exampleDataList"
                                                                   class="form-label">Organization</label>
                                                            <input type="text" placeholder="Organization"
                                                                   id="dobWithTitle" class="form-control"
                                                                   list="datalistOptions3">
                                                            <datalist id="datalistOptions3">
                                                                @php
                                                                    $organization_dropdown = array();
                                                                    foreach ($issues as $issue) {
                                                                      if (!in_array($issue["organization"]["name"], $organization_dropdown)){
                                                                        array_push($organization_dropdown, $issue["organization"]["name"]);
                                                                      }
                                                                    }
                                                                @endphp
                                                                @foreach ($organization_dropdown as $orgdd)
                                                                    <option value='{{$orgdd}}'></option>
                                                                @endforeach
                                                            </datalist>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Tags</th>
                                                        <th>Organization</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                    @if (count($issues)<1)
                                                        <tr>
                                                            No Issues created by user yet.
                                                        </tr>
                                                    @else
                                                        @php
                                                            foreach ($issues as $issue) {
                                                        @endphp
                                                        <tr>
                                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                <strong>{{$issue["id"]}}</strong></td>
                                                            <td>{{$issue["title"]}}</td>

                                                            <td>
                                                                @foreach ($issue["tags"] as $tag)
                                                                    <span
                                                                        class="badge bg-label-primary me-1">{{$tag["name"]}}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>{{$issue["organization"]["name"]}}</td>

                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="http://127.0.0.1:8000/user/issueinfo?id={{$issue["id"]}}"><i
                                                                                class="bx bx-show me-1"></i> View</a>
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            }
                                                        @endphp
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- / Content -->

                                <!-- Footer -->
                                <footer class="content-footer footer bg-footer-theme">

                                </footer>
                                <!-- / Footer -->

                                <div class="content-backdrop fade"></div>
                            </div>
                            <!-- / Layout page -->
                        </div>


                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">

                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>function checkval() {
            1 == $("tbody tr:visible").length && "No result found" == $("tbody tr:visible td").html() ? $("#rowcount").html("0") : $("#rowcount").html($("tr:visible").length - 1)
        }

        $(document).ready(function () {
            $("#rowcount").html($(".filterable tr").length - 1), $(".filterable .btn-filter").click(function () {
                var t = $(this).parents(".filterable"), e = t.find(".filters input"), l = t.find(".table tbody");
                1 == e.prop("disabled") ? (e.prop("disabled", !1), e.first().focus()) : (e.val("").prop("disabled", !0), l.find(".no-result").remove(), l.find("tr").show()), $("#rowcount").html($(".filterable tr").length - 1)
            }), $(".filterable .filters input").keyup(function (t) {
                if ("9" != (t.keyCode || t.which)) {
                    var e = $(this), l = e.val().toLowerCase(), n = e.parents(".filterable"),
                        i = n.find(".filters th").index(e.parents("th")), r = n.find(".table"), o = r.find("tbody tr"),
                        d = o.filter(function () {
                            return -1 === $(this).find("td").eq(i).text().toLowerCase().indexOf(l)
                        });
                    r.find("tbody .no-result").remove(), o.show(), d.hide(), d.length === o.length && r.find("tbody").prepend($('<tr class="no-result text-center"><td colspan="' + r.find(".filters th").length + '">No result found</td></tr>'))
                }
                $("#rowcount").html($("tr:visible").length - 1), checkval()
            })
        });</script>

    <script>
        (function($) {
            var CheckboxDropdown = function(el) {
                var _this = this;
                this.isOpen = false;
                this.areAllChecked = false;
                this.$el = $(el);
                this.$label = this.$el.find('.dropdown-label');
                this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
                this.$inputs = this.$el.find('[type="checkbox"]');

                this.onCheckBox();

                this.$label.on('click', function(e) {
                    e.preventDefault();
                    _this.toggleOpen();
                });

                this.$checkAll.on('click', function(e) {
                    e.preventDefault();
                    _this.onCheckAll();
                });

                this.$inputs.on('change', function(e) {
                    _this.onCheckBox();
                });
            };

            CheckboxDropdown.prototype.onCheckBox = function() {
                this.updateStatus();
            };

            CheckboxDropdown.prototype.updateStatus = function() {
                var checked = this.$el.find(':checked');

                this.areAllChecked = false;
                this.$checkAll.html('Check All');

                if(checked.length <= 0) {
                    this.$label.html('Select Options');
                }
                else if(checked.length === 1) {
                    this.$label.html(checked.parent('label').text());
                }
                else if(checked.length === this.$inputs.length) {
                    this.$label.html('All Selected');
                    this.areAllChecked = true;
                    this.$checkAll.html('Uncheck All');
                }
                else {
                    this.$label.html(checked.length + ' Selected');
                }
            };

            CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
                if(!this.areAllChecked || checkAll) {
                    this.areAllChecked = true;
                    this.$checkAll.html('Uncheck All');
                    this.$inputs.prop('checked', true);
                }
                else {
                    this.areAllChecked = false;
                    this.$checkAll.html('Check All');
                    this.$inputs.prop('checked', false);
                }

                this.updateStatus();
            };

            CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
                var _this = this;

                if(!this.isOpen || forceOpen) {
                    this.isOpen = true;
                    this.$el.addClass('on');
                    $(document).on('click', function(e) {
                        if(!$(e.target).closest('[data-control]').length) {
                            _this.toggleOpen();
                        }
                    });
                }
                else {
                    this.isOpen = false;
                    this.$el.removeClass('on');
                    $(document).off('click');
                }
            };

            var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
            for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
                new CheckboxDropdown(checkboxesDropdowns[i]);
            }
        })(jQuery);
    </script>
    <script>
        function get_tags() {
            let title_txt = document.getElementById('nameWithTitle');
            let desc_txtarea = document.getElementById('basic-default-message')
            let desc = title_txt.value.concat(" ").concat(desc_txtarea.value)

            console.log(desc)

            fetch('http://127.0.0.1:8002/api/', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRFToken': csrftoken,
                },
                body: JSON.stringify({'issue': desc}),
            })
                .then(response => response.json())
                .then(response => {
                    console.log(JSON.stringify(response))
                    console.log(response["res"])
                    document.getElementById("tag-display-para").innerHTML = response["res"][0].concat(", ").concat(response["res"][1]).concat(", ").concat(response["res"][2])
                    document.getElementById("tag-display-div").removeAttribute('hidden')
                })
                // .then((response) => {
                //     document.getElementById("tag-display-para").innerHTML =
                //     document.getElementById("tag-display-div").removeAttribute('hidden')
                // })


        }
    </script>

{{--    <script>--}}
{{--        function post_issue() {--}}
{{--            let title = document.getElementById('nameWithTitle').value--}}
{{--            let organization = document.getElementById('emailWithTitle').value--}}
{{--            let description = document.getElementById('basic-default-message').value--}}



{{--            fetch('http://127.0.0.1:8002/api/issue/', {--}}
{{--                method: 'POST',--}}
{{--                headers: {--}}
{{--                    'Accept': 'application/json',--}}
{{--                    'Content-Type': 'application/json',--}}
{{--                    'X-CSRFToken': csrftoken,--}}
{{--                },--}}
{{--                body: JSON.stringify({--}}
{{--                    'title': title,--}}
{{--                    'desc_comment': description,--}}
{{--                    'organization_id': document.getElementById('organization_id').value,--}}
{{--                    'tags': tags,--}}
{{--                }),--}}
{{--            })--}}
{{--                .then(response => response.json())--}}
{{--                .then(response => {--}}
{{--                    console.log(JSON.stringify(response))--}}
{{--                })--}}
{{--        }--}}
{{--    </script>--}}
    </body>

    </html>
@endif
