<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{ getProfilePicture() }}" alt="{{ auth()->user()->name }}">
                <h6 class="">{{ auth()->user()->name }}</h6>
                <p class=""></p>
            </div>
        </div>

        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ __active(['AdminController', 'ProfileController'], 'index') }}">
                <a href="{{ route('index') }}"
                    aria-expanded="{{ __displayAria(['AdminController', 'ProfileController'], 'index') }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dasbor</span>
                    </div>
                </a>
            </li>

            @role('super_admin')
            <li class="menu menu-heading">
                <div class="heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>MANAJEMEN HAK AKSES</span>
                </div>
            </li>

            <li class="menu {{ __active('PermissionController', 'roles') }}">
                <a href="{{ route('admin.users.roles') }}"
                    aria-expanded="{{ __displayAria('PermissionController', 'roles') }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Kelola <i>Role</i></span>
                    </div>
                </a>
            </li>
            <li class="menu {{ __active('PermissionController', ['permissions', 'edit']) }}">
                <a href="{{ route('admin.users.permissions') }}"
                    aria-expanded="{{ __displayAria('PermissionController', ['permissions', 'edit']) }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-hash">
                            <line x1="4" y1="9" x2="20" y2="9"></line>
                            <line x1="4" y1="15" x2="20" y2="15"></line>
                            <line x1="10" y1="3" x2="8" y2="21"></line>
                            <line x1="16" y1="3" x2="14" y2="21"></line>
                        </svg>
                        <span>Kelola Hak Akses</span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>MANAJEMEN <i>USER</i></span>
                </div>
            </li>

            <li class="menu {{ __active('UserController') }}">
                <a href="{{ route('admin.users.index') }}" aria-expanded="{{ __displayAria('UserController') }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Kelola <i>User</i></span>
                    </div>
                </a>
            </li>
            @endrole

            @if (current_user_can(['create_form', 'read_form', 'update_form', 'delete_form']))
                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg><span>MANAJEMEN FORMULIR</span></div>
                </li>

                @if (current_user_can(['read_form', 'update_form', 'delete_form']))
                    <li
                        class="menu {{ __active('FormController', ['index', 'edit', 'answer', 'show', 'answers']) }}">
                        <a href="{{ route('admin.forms.index') }}"
                            aria-expanded="{{ __displayAria('FormController', ['index', 'edit', 'answer', 'show', 'answers']) }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span>Kelola Formulir</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can('create_form'))
                    <li class="menu {{ __active('FormController', 'create') }}">
                        <a href="{{ route('admin.forms.create') }}"
                            aria-expanded="{{ __displayAria('FormController', 'create') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus-square">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                                <span>Buat Formulir</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can('send_certificate'))
                    <li class="menu {{ __active('CertificateController', 'create') }}">

                        <a href="{{ route('admin.certificate.create') }}"
                            aria-expanded="{{ __displayAria('CertificateController', 'create') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                <span>Kirim Sertifikat</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endif

            @if (current_user_can(['create_blog_post', 'read_blog_post', 'update_blog_post', 'delete_blog_post']) || current_user_can(['create_blog_comment', 'read_blog_comment', 'update_blog_comment', 'delete_blog_comment']) || current_user_can(['create_blog_category', 'read_blog_category', 'update_blog_category', 'delete_blog_category']))
                <li class="menu menu-heading">
                    <div class="heading">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>BLOG</span>
                    </div>
                </li>

                @if (current_user_can(['create_blog_post', 'read_blog_post', 'update_blog_post', 'delete_blog_post']))
                    <li class="menu {{ __active('PostController', 'create') }}">
                        <a href="{{ route('admin.blog.posts.create') }}"
                            aria-expanded="{{ __displayAria('PostController', 'create') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Tambah Posting</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu {{ __active('PostController', ['index', 'edit', 'show', 'trash', 'deleted']) }}">
                        <a href="{{ route('admin.blog.posts.index') }}"
                            aria-expanded="{{ __displayAria('PostController', ['index', 'edit', 'show', 'trash', 'deleted']) }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-book">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                <span>Kelola Posting</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_blog_comment', 'read_blog_comment', 'update_blog_comment', 'delete_blog_comment']))
                    <li class="menu {{ __active('CommentController') }}">
                        <a href="{{ route('admin.blog.comments.index') }}"
                            aria-expanded="{{ __displayAria('CommentController') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-message-circle">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                    </path>
                                </svg>
                                <span>Komentar</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_blog_category', 'read_blog_category', 'update_blog_category', 'delete_blog_category']))
                    <li class="menu {{ __active('CategoryController') }}">
                        <a href="{{ route('admin.blog.category') }}"
                            aria-expanded="{{ __displayAria('CategoryController') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-list">
                                    <line x1="8" y1="6" x2="21" y2="6"></line>
                                    <line x1="8" y1="12" x2="21" y2="12"></line>
                                    <line x1="8" y1="18" x2="21" y2="18"></line>
                                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                </svg>
                                <span>Kelola Kategori</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endif

            @if (current_user_can(['create_gallery', 'read_gallery', 'upgallery', 'delete_gallery']))
                <li class="menu menu-heading">
                    <div class="heading">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>GALLERY</span>
                    </div>
                </li>
                @if (current_user_can('create_gallery'))
                    <li class="menu {{ __active('GalleryController', 'create') }}">
                        <a href="{{ route('admin.gallery.create') }}"
                            aria-expanded="{{ __displayAria('GalleryController', 'create') }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Tambah Album</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can('read_gallery'))
                    <li class="menu {{ __active('GalleryController', ['index', 'edit', 'show']) }}">
                        <a href="{{ route('admin.gallery.index') }}"
                            aria-expanded="{{ __displayAria('GalleryController', ['index', 'edit', 'show']) }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-image">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span>Kelola Album</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_gallery', 'read_gallery']))
                    <li class="menu {{ __active('GalleryController', 'categories') }}">
                        <a href="{{ route('admin.gallery.categories') }}"
                            aria-expanded="{{ __displayAria('GalleryController', 'categories') }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-list">
                                    <line x1="8" y1="6" x2="21" y2="6"></line>
                                    <line x1="8" y1="12" x2="21" y2="12"></line>
                                    <line x1="8" y1="18" x2="21" y2="18"></line>
                                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                </svg>
                                <span>Kelola Kategori</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endif

            @if (current_user_can(['create_member', 'read_member', 'update_member', 'delete_member']) || current_user_can(['create_period', 'read_period', 'update_period', 'delete_period']) || current_user_can(['create_division', 'read_division', 'update_division', 'delete_division']) || current_user_can(['create_position', 'read_position', 'update_position', 'delete_position']) || current_user_can(['create_staff', 'read_staff', 'update_staff', 'delete_staff']))
                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg><span>MANAJEMEN ANGGOTA</span></div>
                </li>

                @if (current_user_can(['create_period', 'read_period', 'update_period', 'delete_period']))
                    <li class="menu {{ __active('MemberController', 'periods') }}">
                        <a href="{{ route('admin.periods') }}"
                            aria-expanded="{{ __displayAria('MemberController', 'periods') }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clock">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>Periode</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_force', 'read_force', 'update_force', 'delete_force']))
                    <li class="menu {{ __active('MemberController', 'forces') }}">
                        <a href="{{ route('admin.forces') }}"
                            aria-expanded="{{ __displayAria('MemberController', 'forces') }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-sliders">
                                    <line x1="4" y1="21" x2="4" y2="14"></line>
                                    <line x1="4" y1="10" x2="4" y2="3"></line>
                                    <line x1="12" y1="21" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="3"></line>
                                    <line x1="20" y1="21" x2="20" y2="16"></line>
                                    <line x1="20" y1="12" x2="20" y2="3"></line>
                                    <line x1="1" y1="14" x2="7" y2="14"></line>
                                    <line x1="9" y1="8" x2="15" y2="8"></line>
                                    <line x1="17" y1="16" x2="23" y2="16"></line>
                                </svg>
                                <span>Angkatan</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_division', 'read_division', 'update_division', 'delete_division']))
                    <li class="menu {{ __active('MemberController', 'divisions') }}">
                        <a href="{{ route('admin.divisions') }}"
                            aria-expanded="{{ __displayAria('MemberController', 'divisions') }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layout">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                                <span>Divisi</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_position', 'read_position', 'update_position', 'delete_position']))
                    <li class="menu {{ __active('MemberController', 'positions') }}">
                        <a href="{{ route('admin.positions') }}"
                            aria-expanded="{{ __displayAria('MemberController', 'positions') }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clipboard">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                                <span>Jabatan</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_member', 'read_member', 'update_member', 'delete_member']))
                    <li class="menu {{ __active('MemberController', ['index', 'show']) }}">
                        <a href="{{ route('admin.members') }}"
                            aria-expanded="{{ __displayAria('MemberController', ['index', 'show']) }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Anggota</span>
                            </div>
                        </a>
                    </li>
                @endif
                @if (current_user_can(['create_staff', 'read_staff', 'update_staff', 'delete_staff']))
                    <li class="menu {{ __active('StaffController') }}">
                        <a href="{{ route('admin.staff.index') }}"
                            aria-expanded="{{ __displayAria('StaffController') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clipboard">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                                <span>Pengurus</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endif

            @if (current_user_can(['read_site_setting', 'update_site_setting']))
                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg><span>PENGATURAN</span></div>
                </li>

                <li class="menu {{ __active('SettingController') }}">
                    <a href="#settings" data-toggle="collapse"
                        aria-expanded="{{ __displayAria('SettingController') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                            <span>Pengaturan</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="settings" data-parent="#accordionExample">
                        <li>
                            <a href="{{ route('admin.settings.general') }}">Umum</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.blog') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.socials') }}">Sosial Media</a>
                        </li>
                    </ul>
                </li>

                @role('super_admin')
                <li class="menu {{ __active('SettingController', 'webmaster') }}">
                    <a href="{{ route('admin.settings.webmaster') }}"
                        aria-expanded="{{ __displayAria('SettingController', 'webmaster') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <span>Webmaster</span>
                        </div>
                    </a>
                </li>
                @endrole
            @endif
        </ul>
    </nav>
</div>
