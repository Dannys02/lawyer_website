 <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
     <div class="container-xxl d-flex h-100">
         <ul class="menu-inner pb-2 pb-xl-0">
             <!-- Dashboards -->
             <li class="menu-item {{ Route::is('home') ? 'active' : '' }}">
                 <a href="{{ route('home') }}" class="menu-link ">
                     <i class="menu-icon tf-icons ti ti-smart-home"></i>
                     <div data-i18n="Dashboards">Dashboards</div>
                 </a>
             </li>

             <!-- Artikel Hukum -->
             <li class="menu-item {{ Route::is('legal_opini.index') ? 'active' : '' }}">
                 <a href="{{ route('legal_opini.index') }}" class="menu-link">
                     <i class="menu-icon tf-icons ti ti-file-text"></i>
                     <div data-i18n="Artikel Hukum">Artikel Hukum</div>
                 </a>
             </li>

             <!-- News -->
             <li class="menu-item {{ Route::is('news.index') ? 'active' : '' }}">
                 <a href="{{ route('news.index') }}" class="menu-link">
                     <i class="menu-icon tf-icons ti ti-news"></i>
                     <div data-i18n="News">News</div>
                 </a>
             </li>

             <!-- Legal Patnership -->
             <li class="menu-item {{ Route::is('legal_patnership.index') ? 'active' : '' }}">
                 <a href="{{ route('legal_patnership.index') }}" class="menu-link">
                     <i class="menu-icon tf-icons ti ti-briefcase"></i>
                     <div data-i18n="Legal Patnership">Legal Patnership</div>
                 </a>
             </li>

             <!-- Jurnal -->
             <li class="menu-item {{ Route::is('jurnal.index') ? 'active' : '' }}">
                 <a href="{{ route('jurnal.index') }}" class="menu-link">
                     <i class="menu-icon tf-icons ti ti-book"></i>

                     <div data-i18n="Jurnal">Jurnal</div>
                 </a>
             </li>

             <!-- Galery -->
             <li class="menu-item {{ Route::is('galery.index') ? 'active' : '' }}">
                 <a href="{{ route('galery.index') }}" class="menu-link">
                     <i class="menu-icon tf-icons ti ti-photo"></i>

                     <div>Galery</div>
                 </a>
             </li>

         </ul>
     </div>
 </aside>
