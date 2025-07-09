      <aside
          class="bg-white row-span-2 border-r border-neutral relative flex flex-col justify-between p-[25px] dark:bg-dark-neutral-bg dark:border-dark-neutral-border">
          <div class="absolute p-2 border-neutral right-0 border bg-white rounded-full cursor-pointer duration-300 translate-x-1/2 hover:opacity-75 dark:bg-dark-neutral-bg dark:border-dark-neutral-border"
              id="sidebar-btn"><img src="assets/images/icons/icon-arrow-left.svg" alt="left chevron icon"></div>
          <div><a class="mb-10" href="index.html"> <img class="logo-maximize" src="assets/images/icons/icon-logo.svg"
                      alt="Frox logo"><img class="logo-minimize ml-[10px]" src="assets/images/icons/icon-favicon.svg"
                      alt="Frox logo"></a>
              <div class="pt-[106px] lg:pt-[35px] pb-[18px]">

                  <div class="sidemenu-item rounded-xl relative">
                      <input class="sr-only peer" type="checkbox" value="dashboard" name="sidemenu" id="dashboard">
                      <label
                          class="flex items-center justify-between w-full cursor-pointer py-[17px] px-[21px] focus:outline-none peer-checked:border-transparent active"
                          for="dashboard">
                          <div class="flex items-center gap-[10px]"><img
                                  src="assets/images/icons/icon-favorite-chart.svg" alt="side menu icon"><span
                                  class="text-normal font-semibold text-gray-500 sidemenu-title dark:text-gray-dark-500">Dashboard</span>
                          </div>
                      </label><img
                          class="absolute right-2 transition-all duration-150 caret-icon pointer-events-none peer-checked:rotate-180 top-[22px]"
                          src="assets/images/icons/icon-arrow-down.svg" alt="caret icon">
                      <div class="hidden peer-checked:block">
                          <ul class="text-gray-300 child-menu z-10 pl-[53px]">
                              <li class="pb-2 transition-opacity duration-150 hover:opacity-75"><a class="text-normal"
                                      href="index.html">Dashboard</a></li>
                          </ul>
                      </div>
                  </div>

                  <div class="w-full bg-neutral h-[1px] mb-[21px] dark:bg-dark-neutral-border"></div>

                  <div
                      class="rounded-xl bg-neutral pt-4 flex items-center gap-5 mt-5 sidebar-control pr-[18px] pb-[13px] pl-[19px] dark:bg-dark-neutral-border">
                      <div class="flex items-center gap-3"><i class="moon-icon" id="theme-toggle-dark-icon"><img
                                  class="cursor-pointer" src="assets/images/icons/icon-moon.svg" alt="moon icon"><img
                                  class="cursor-pointer" src="assets/images/icons/icon-moon-active.svg"
                                  alt="moon icon"></i>
                          <label class="flex items-center cursor-pointer" for="theme-toggle" id="toggle-theme-btn">
                              <div class="relative">
                                  <input class="sr-only peer" type="checkbox" name="" id="theme-toggle">
                                  <div
                                      class="block rounded-full w-[48px] h-[16px] bg-gray-300 peer-checked:bg-[#B2A7FF]">
                                  </div>
                                  <div
                                      class="dot dotS absolute rounded-full transition h-[24px] w-[24px] top-[-4px] left-[-4px] bg-[#B2A7FF] peer-checked:bg-color-brands">
                                  </div>
                              </div>
                          </label><i class="sun-icon" id="theme-toggle-light-icon"><img class="cursor-pointer"
                                  src="assets/images/icons/icon-sun.svg" alt="sun icon"><img class="cursor-pointer"
                                  src="assets/images/icons/icon-sun-active.svg" alt="sun icon"></i>
                      </div>
                      <div class="bg-neutral-bg w-[2px] h-[30px] dark:bg-dark-neutral-bg"></div>
                      <div> <img class="cursor-pointer" id="sidebar-expand"
                              src="assets/images/icons/icon-maximize-3.svg" alt="expand icon"></div>
                  </div>
      </aside>
