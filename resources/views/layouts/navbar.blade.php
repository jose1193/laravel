<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
      <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
          <a href="/dashboard" class="flex items-center">
              <img src="{{ asset('img/logo.png') }}" class="mr-3 h-6 sm:h-20" alt=" Logo" />
             
          </a>
          <div class="flex items-center lg:order-2">
            
              @guest
              <a href="{{ route('register') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 
              focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 
              py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Join</a>
              <a href="{{ route('login') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Log in</a>
             
              @else
              <a href="/profile" class="text-gray-800 dark:text-white hover:bg-gray-50 
                  focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 
                  py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Welcome !</a> 
              <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full bg-white" src="{{ auth()->user()->image ? asset('thumbnail'). '/'. auth()->user()->image :
                asset('img/admin.png') }}" alt="user photo">
              </button>
              <!-- Dropdown menu -->
              <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="py-3 px-4">
                  <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                  <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="user-menu-button">
                  <li>
                    <a href="/dashboard" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                  </li>
                  <li>
                    <a href="/users-list" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                  </li>
                  <li>
                    <a href="/change-password" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change Password</a>
                  </li>
                  <li>
                    <form action="{{ route('logout') }}" method="POST" novalidate>
                      @csrf
                      <button type="submit" class="text-white
                      bg-primary-700 hover:bg-primary-800 focus:ring-4
                       focus:ring-primary-300 font-medium rounded-lg
                        text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                         dark:bg-primary-600 dark:hover:bg-primary-700 
                         focus:outline-none dark:focus:ring-primary-800">Logout</button>
                    
                     
                    </form>
                  </li>
                </ul>
              </div>
             
                 
                 
                  @endguest
              <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                  <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
          </div>
          <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
              <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
               <!-- SHOW LINKS SI EL USER ESTA AUTENTICADO -->
                @if(auth()->check()) 
                <li>
                      <a href="/dashboard" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                  </li>
                  @else
                  <li>
                    <a href="{{ route('home') }}" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                  @endif
                   <!-- SHOW LINKS SI EL USER ESTA AUTENTICADO -->
                  <li>
                      <a href="/about" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                  </li>
                  <li>
                    <a href="{{route('contact')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>

                 <!-- SHOW LINKS SI EL USER ESTA AUTENTICADO -->
                  @auth
                  <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class=" capitalize flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                      rates coins <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class=" capitalize hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="/coins" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                            capitalize">coins</a>
                          </li>
                          <li>
                            <a href="/apisurl" class="
                            block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600
                             dark:hover:text-white">API's</a>
                          </li>
  
                          <li>
                            <a href="/calculator" class="
                            block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600
                             dark:hover:text-white">calculator</a>
                          </li>
                         
                        </ul>
                       
                    </div>
                </li>
  
                <li>
                  <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2" class=" capitalize flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                   budgets<svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                  <!-- Dropdown menu -->
                  <div id="dropdownNavbar2" class=" capitalize hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                          <a href="/budgets" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                          capitalize">monthly budget </a>
                        </li>
                        <li>
                          <a href="/sendbudgets" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                          capitalize">send monthly budget </a>
                        </li>
  
                        <li>
                          <a href="/chart" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                          capitalize">chart </a>
                        </li>
                       
                      </ul>
                     
                  </div>
              </li>
                
              <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar3" class=" capitalize flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                  food market<svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar3" class=" capitalize hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="/marketcompanies" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                        capitalize"> market companies </a>
                      </li>
                      <li>
                        <a href="/" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                        capitalize">menu 1 </a>
                      </li>

                      <li>
                        <a href="/" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                        capitalize">menu 2 </a>
                      </li>
                     
                    </ul>
                   
                </div>
            </li>

                  <li>
                      <a href="/emails" class="block py-2 pr-4 pl-3 text-gray-700 border-b
                       border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0
                        lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white
                         dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                          dark:border-gray-700">Emails</a>
                  </li>
                  @endauth
 <!-- SHOW LINKS SI EL USER ESTA AUTENTICADO -->

              </ul>
          </div>
      </div>
  </nav>
      
     
  </header>
    