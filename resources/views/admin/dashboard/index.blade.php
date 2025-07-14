@extends('layouts.layout')
<<<<<<< HEAD

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Dashboard</x-slot:title>
        </x-breadcrumb>

        <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-1 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">Total Users</p>
                                <h6 class="mb-0">20,000</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="gridicons:multiple-users"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center gap-1 text-success-main"><iconify-icon
                                    icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                                +5000</span>
                            Last 30 days users
                        </p>
                    </div>
                </div>
                <!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-2 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">
                                    Total Subscription
                                </p>
                                <h6 class="mb-0">15,000</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center gap-1 text-danger-main"><iconify-icon
                                    icon="bxs:down-arrow" class="text-xs"></iconify-icon>
                                -800</span>
                            Last 30 days subscription
                        </p>
                    </div>
                </div>
                <!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-3 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">
                                    Total Free Users
                                </p>
                                <h6 class="mb-0">5,000</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="fluent:people-20-filled"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center gap-1 text-success-main"><iconify-icon
                                    icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                                +200</span>
                            Last 30 days users
                        </p>
                    </div>
                </div>
                <!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-4 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">
                                    Total Income
                                </p>
                                <h6 class="mb-0">$42,000</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center gap-1 text-success-main"><iconify-icon
                                    icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                                +$20,000</span>
                            Last 30 days income
                        </p>
                    </div>
                </div>
                <!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-5 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">
                                    Total Expense
                                </p>
                                <h6 class="mb-0">$30,000</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="fa6-solid:file-invoice-dollar"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center gap-1 text-success-main"><iconify-icon
                                    icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                                +$5,000</span>
                            Last 30 days expense
                        </p>
                    </div>
                </div>
                <!-- card end -->
            </div>
        </div>

        <div class="row gy-4 mt-1">
            <div class="col-xxl-6 col-xl-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <h6 class="text-lg mb-0">Sales Statistic</h6>
                            <select class="form-select bg-base form-select-sm w-auto radius-8">
                                <option>Yearly</option>
                                <option>Monthly</option>
                                <option>Weekly</option>
                                <option>Today</option>
                            </select>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                            <h6 class="mb-0">$27,200</h6>
                            <span
                                class="text-sm fw-semibold rounded-pill bg-success-focus text-success-main border br-success px-8 py-4 line-height-1 d-flex align-items-center gap-1">
                                10%
                                <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                            </span>
                            <span class="text-xs fw-medium">+ $1500 Per Day</span>
                        </div>
                        <div id="chart" class="pt-28 apexcharts-tooltip-style-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6">
                <div class="card h-100 radius-8 border">
                    <div class="card-body p-24">
                        <h6 class="mb-12 fw-semibold text-lg mb-16">
                            Total Subscriber
                        </h6>
                        <div class="d-flex align-items-center gap-2 mb-20">
                            <h6 class="fw-semibold mb-0">5,000</h6>
                            <p class="text-sm mb-0">
                                <span
                                    class="bg-danger-focus border br-danger px-8 py-2 rounded-pill fw-semibold text-danger-main text-sm d-inline-flex align-items-center gap-1">
                                    10%
                                    <iconify-icon icon="iconamoon:arrow-down-2-fill" class="icon"></iconify-icon>
                                </span>
                                - 20 Per Day
                            </p>
                        </div>

                        <div id="barChart" class="barChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6">
                <div class="card h-100 radius-8 border-0 overflow-hidden">
                    <div class="card-body p-24">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg">Users Overview</h6>
                            <div class="">
                                <select
                                    class="form-select form-select-sm w-auto bg-base border text-secondary-light radius-8">
                                    <option>Today</option>
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                    <option>Yearly</option>
                                </select>
                            </div>
                        </div>

                        <div id="userOverviewDonutChart" class="apexcharts-tooltip-z-none"></div>

                        <ul class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-3">
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                                <span class="text-secondary-light text-sm fw-normal">New:
                                    <span class="text-primary-light fw-semibold">500</span>
                                </span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px radius-2 bg-yellow"></span>
                                <span class="text-secondary-light text-sm fw-normal">Subscribed:
                                    <span class="text-primary-light fw-semibold">300</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-12">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                            <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button"
                                        role="tab" aria-controls="pills-to-do-list" aria-selected="true">
                                        Latest Registered
                                        <span
                                            class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">35</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center" id="pills-recent-leads-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-recent-leads" type="button"
                                        role="tab" aria-controls="pills-recent-leads" aria-selected="false"
                                        tabindex="-1">
                                        Latest Subscribe
                                        <span
                                            class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">35</span>
                                    </button>
                                </li>
                            </ul>
                            <a href="javascript:void(0)"
                                class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                View All
                                <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                            </a>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-to-do-list" role="tabpanel"
                                aria-labelledby="pills-to-do-list-tab" tabindex="0">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Users</th>
                                                <th scope="col">Registered On</th>
                                                <th scope="col">Plan</th>
                                                <th scope="col" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user1.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Dianne Russell
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">redaniel@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Free</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user2.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Wade Warren
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">xterris@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Basic</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user3.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Albert Flores
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">seannand@mail.ru</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Standard</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user4.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Bessie Cooper
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">igerrin@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Business</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user5.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Arlene McCoy
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Enterprise</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel"
                                aria-labelledby="pills-recent-leads-tab" tabindex="0">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Users</th>
                                                <th scope="col">Registered On</th>
                                                <th scope="col">Plan</th>
                                                <th scope="col" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user1.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Dianne Russell
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">redaniel@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Free</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user2.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Wade Warren
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">xterris@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Basic</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user3.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Albert Flores
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">seannand@mail.ru</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Standard</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user4.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Bessie Cooper
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">igerrin@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Business</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/user5.png" alt=""
                                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-md mb-0 fw-medium">
                                                                Arlene McCoy
                                                            </h6>
                                                            <span
                                                                class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Enterprise</td>
                                                <td class="text-center">
                                                    <span
                                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg mb-0">Top Performer</h6>
                            <a href="javascript:void(0)"
                                class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                View All
                                <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                            </a>
                        </div>

                        <div class="mt-32">
                            <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/users/user1.png" alt=""
                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                    <div class="flex-grow-1">
                                        <h6 class="text-md mb-0 fw-medium">Dianne Russell</h6>
                                        <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                                    </div>
                                </div>
                                <span class="text-primary-light text-md fw-medium">$20</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/users/user2.png" alt=""
                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                    <div class="flex-grow-1">
                                        <h6 class="text-md mb-0 fw-medium">Wade Warren</h6>
                                        <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                                    </div>
                                </div>
                                <span class="text-primary-light text-md fw-medium">$20</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/users/user3.png" alt=""
                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                    <div class="flex-grow-1">
                                        <h6 class="text-md mb-0 fw-medium">Albert Flores</h6>
                                        <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                                    </div>
                                </div>
                                <span class="text-primary-light text-md fw-medium">$30</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/users/user4.png" alt=""
                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                    <div class="flex-grow-1">
                                        <h6 class="text-md mb-0 fw-medium">Bessie Cooper</h6>
                                        <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                                    </div>
                                </div>
                                <span class="text-primary-light text-md fw-medium">$40</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/users/user5.png" alt=""
                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                    <div class="flex-grow-1">
                                        <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                        <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                                    </div>
                                </div>
                                <span class="text-primary-light text-md fw-medium">$10</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/users/user1.png" alt=""
                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                    <div class="flex-grow-1">
                                        <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                        <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                                    </div>
                                </div>
                                <span class="text-primary-light text-md fw-medium">$10</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                            <h6 class="mb-2 fw-bold text-lg mb-0">Top Countries</h6>
                            <select class="form-select form-select-sm w-auto bg-base border text-secondary-light radius-8">
                                <option>Today</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>

                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div id="world-map" class="h-100 border radius-8"></div>
                            </div>

                            <div class="col-lg-6">
                                <div class="h-100 border p-16 pe-0 radius-8">
                                    <div class="max-h-266-px overflow-y-auto scroll-sm pe-16">
                                        <div class="d-flex align-items-center justify-content-between gap-3 mb-12 pb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <img src="assets/images/flags/flag1.png" alt=""
                                                    class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12" />
                                                <div class="flex-grow-1">
                                                    <h6 class="text-sm mb-0">USA</h6>
                                                    <span class="text-xs text-secondary-light fw-medium">1,240 Users</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 w-100">
                                                <div class="w-100 max-w-66 ms-auto">
                                                    <div class="progress progress-sm rounded-pill" role="progressbar"
                                                        aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary-600 rounded-pill"
                                                            style="width: 80%"></div>
                                                    </div>
                                                </div>
                                                <span class="text-secondary-light font-xs fw-semibold">80%</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-3 mb-12 pb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <img src="assets/images/flags/flag2.png" alt=""
                                                    class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12" />
                                                <div class="flex-grow-1">
                                                    <h6 class="text-sm mb-0">Japan</h6>
                                                    <span class="text-xs text-secondary-light fw-medium">1,240 Users</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 w-100">
                                                <div class="w-100 max-w-66 ms-auto">
                                                    <div class="progress progress-sm rounded-pill" role="progressbar"
                                                        aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-orange rounded-pill"
                                                            style="width: 60%"></div>
                                                    </div>
                                                </div>
                                                <span class="text-secondary-light font-xs fw-semibold">60%</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-3 mb-12 pb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <img src="assets/images/flags/flag3.png" alt=""
                                                    class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12" />
                                                <div class="flex-grow-1">
                                                    <h6 class="text-sm mb-0">France</h6>
                                                    <span class="text-xs text-secondary-light fw-medium">1,240 Users</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 w-100">
                                                <div class="w-100 max-w-66 ms-auto">
                                                    <div class="progress progress-sm rounded-pill" role="progressbar"
                                                        aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-yellow rounded-pill"
                                                            style="width: 49%"></div>
                                                    </div>
                                                </div>
                                                <span class="text-secondary-light font-xs fw-semibold">49%</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-3 mb-12 pb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <img src="assets/images/flags/flag4.png" alt=""
                                                    class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12" />
                                                <div class="flex-grow-1">
                                                    <h6 class="text-sm mb-0">Germany</h6>
                                                    <span class="text-xs text-secondary-light fw-medium">1,240 Users</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 w-100">
                                                <div class="w-100 max-w-66 ms-auto">
                                                    <div class="progress progress-sm rounded-pill" role="progressbar"
                                                        aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-success-main rounded-pill"
                                                            style="width: 100%"></div>
                                                    </div>
                                                </div>
                                                <span class="text-secondary-light font-xs fw-semibold">100%</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-3 mb-12 pb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <img src="assets/images/flags/flag5.png" alt=""
                                                    class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12" />
                                                <div class="flex-grow-1">
                                                    <h6 class="text-sm mb-0">South Korea</h6>
                                                    <span class="text-xs text-secondary-light fw-medium">1,240 Users</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 w-100">
                                                <div class="w-100 max-w-66 ms-auto">
                                                    <div class="progress progress-sm rounded-pill" role="progressbar"
                                                        aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-info-main rounded-pill"
                                                            style="width: 30%"></div>
                                                    </div>
                                                </div>
                                                <span class="text-secondary-light font-xs fw-semibold">30%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div class="d-flex align-items-center w-100">
                                                <img src="assets/images/flags/flag1.png" alt=""
                                                    class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12" />
                                                <div class="flex-grow-1">
                                                    <h6 class="text-sm mb-0">USA</h6>
                                                    <span class="text-xs text-secondary-light fw-medium">1,240 Users</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 w-100">
                                                <div class="w-100 max-w-66 ms-auto">
                                                    <div class="progress progress-sm rounded-pill" role="progressbar"
                                                        aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary-600 rounded-pill"
                                                            style="width: 80%"></div>
                                                    </div>
                                                </div>
                                                <span class="text-secondary-light font-xs fw-semibold">80%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg mb-0">Generated Content</h6>
                            <select class="form-select form-select-sm w-auto bg-base border text-secondary-light radius-8">
                                <option>Today</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>

                        <ul class="d-flex flex-wrap align-items-center mt-3 gap-3">
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                                <span class="text-secondary-light text-sm fw-semibold">Word:
                                    <span class="text-primary-light fw-bold">500</span>
                                </span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px rounded-circle bg-yellow"></span>
                                <span class="text-secondary-light text-sm fw-semibold">Image:
                                    <span class="text-primary-light fw-bold">300</span>
                                </span>
                            </li>
                        </ul>

                        <div class="mt-40">
                            <div id="paymentStatusChart" class="margin-16-minus"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
=======
@section('title', 'Dashboard')
@section('content')
    <!-- write your code here-->
        <div>
          <h2 class="capitalize text-gray-1100 font-bold text-[28px] leading-[35px] dark:text-gray-dark-1100 mb-[13px]">Dashboard</h2>
          <div class="flex items-center text-xs text-gray-500 gap-x-[11px] mb-[37px]">
            <div class="flex items-center gap-x-1"><img src="assets/images/icons/icon-home-2.svg" alt="home icon"><a class="capitalize" href="index.html">home</a></div><img src="assets/images/icons/icon-arrow-right.svg" alt="arrow right icon"><span class="capitalize text-color-brands">Dashboard</span>
          </div>
          <div class="grid grid-cols-1 gap-6 mb-[26px] lg:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg py-4 flex-1 px-[19px]">
              <div class="flex items-center justify-between mb-4">
                <p class="text-desc text-gray-500 dark:text-gray-dark-500">Total sells</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="flex items-center justify-between mb-[2px]">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 rounded-lg grid place-items-center bg-green"><img src="assets/images/icons/icon-bag-happy.svg" alt=""></div>
                  <p class="text-btn-label font-bold text-gray-1100 dark:text-gray-dark-1100">$126.500</p>
                </div>
                <div class="flex items-center gap-[7px]"><img src="assets/images/icons/icon-export-green.svg" alt=""><span class="text-green text-subtitle font-medium">34.7%</span></div>
              </div>
              <p class="text-right text-gray-400 dark:text-gray-dark-400 text-[11px] leading-[16px]">Compared to Jan 2022</p>
            </div>
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg py-4 flex-1 px-[19px]">
              <div class="flex items-center justify-between mb-4">
                <p class="text-desc text-gray-500 dark:text-gray-dark-500">Orders value</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="flex items-center justify-between mb-[2px]">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 rounded-lg grid place-items-center bg-blue"><img src="assets/images/icons/icon-bag-happy.svg" alt=""></div>
                  <p class="text-btn-label font-bold text-gray-1100 dark:text-gray-dark-1100">$136.800</p>
                </div>
                <div class="flex items-center gap-[7px]"><img src="assets/images/icons/icon-export-green.svg" alt=""><span class="text-green text-subtitle font-medium">22.8%</span></div>
              </div>
              <p class="text-right text-gray-400 dark:text-gray-dark-400 text-[11px] leading-[16px]">Compared to Jan 2022</p>
            </div>
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg py-4 flex-1 px-[19px]">
              <div class="flex items-center justify-between mb-4">
                <p class="text-desc text-gray-500 dark:text-gray-dark-500">Daily orders</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="flex items-center justify-between mb-[2px]">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 rounded-lg grid place-items-center bg-violet"><img src="assets/images/icons/icon-bag-happy.svg" alt=""></div>
                  <p class="text-btn-label font-bold text-gray-1100 dark:text-gray-dark-1100">$25.200</p>
                </div>
                <div class="flex items-center gap-[7px]"><img src="assets/images/icons/icon-export-green.svg" alt=""><span class="text-green text-subtitle font-medium">17.8%</span></div>
              </div>
              <p class="text-right text-gray-400 dark:text-gray-dark-400 text-[11px] leading-[16px]">Compared to Jan 2022</p>
            </div>
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg py-4 flex-1 px-[19px]">
              <div class="flex items-center justify-between mb-4">
                <p class="text-desc text-gray-500 dark:text-gray-dark-500">Total sells</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="flex items-center justify-between mb-[2px]">
                <div class="flex items-center gap-2">
                  <div class="w-8 h-8 rounded-lg grid place-items-center bg-pink"><img src="assets/images/icons/icon-bag-happy.svg" alt=""></div>
                  <p class="text-btn-label font-bold text-gray-1100 dark:text-gray-dark-1100">$12.125</p>
                </div>
                <div class="flex items-center gap-[7px]"><img src="assets/images/icons/icon-export-green.svg" alt=""><span class="text-green text-subtitle font-medium">23.9%</span></div>
              </div>
              <p class="text-right text-gray-400 dark:text-gray-dark-400 text-[11px] leading-[16px]">Compared to Jan 2022</p>
            </div>
          </div>
          <div class="grid grid-cols-1 items-center mb-6 gap-[18px] xl:grid-cols-[1fr,364px]">
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
              <div class="flex items-center justify-between px-6 py-[18px]">
                <p class="text-subtitle-semibold font-semibold text-gray-1100 dark:text-gray-dark-1100">Sales Performance</p>
                <div class="flex items-center gap-4 text-desc">
                  <p class="text-gray-400 dark:text-gray-dark-400">Today’s</p>
                  <p class="text-color-brands">Monthly</p>
                  <p class="text-gray-400 dark:text-gray-dark-400">Yearly</p>
                  <div class="dropdown dropdown-end translate-x-4 ml-[10px]">
                    <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                    </label>
                    <ul class="dropdown-content" tabindex="0">
                      <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                        <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                        <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                        </li>
                        <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                        </li>
                        <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                        </li>
                        <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                        </li>
                        <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                        <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                        </li>
                      </div>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="w-full bg-neutral h-[1px] mb-[19px] dark:bg-dark-neutral-border"></div>
              <div class="px-6 py-[18px]">
                <div>
                  <canvas class="max-h-[400px]" width="400" height="400" id="performanceChart"></canvas>
                </div>
              </div>
            </div>
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg flex-1 self-stretch">
              <div class="flex items-center justify-between px-6 py-[18px]">
                <p class="text-subtitle-semibold font-semibold text-gray-1100 dark:text-gray-dark-1100">Best Sellers</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border"></div>
              <div class="pt-5 flex flex-col gap-5 px-[26px] pb-[22px]">
                <div class="flex items-center justify-between">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 overflow-hidden rounded-lg"><img class="w-full h-full object-cover" src="assets/images/seller-avatar-1.png" alt="seller avatar"></div>
                    <div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100 mb-4">Esther Howard</p>
                      <p class="text-desc text-gray-400 dark:text-gray-dark-400">Louis Vuitton</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-normal font-semibold text-gray-1100 mb-4 dark:text-gray-dark-1100">$778.35</p>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">1258 sales</p>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 overflow-hidden rounded-lg"><img class="w-full h-full object-cover" src="assets/images/seller-avatar-2.png" alt="seller avatar"></div>
                    <div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100 mb-4">Wade Warren</p>
                      <p class="text-desc text-gray-400 dark:text-gray-dark-400">Binford Ltd.</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-normal font-semibold text-gray-1100 mb-4 dark:text-gray-dark-1100">$576.28</p>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">1028 sales</p>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 overflow-hidden rounded-lg"><img class="w-full h-full object-cover" src="assets/images/seller-avatar-3.png" alt="seller avatar"></div>
                    <div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100 mb-4">Cameron Williamson</p>
                      <p class="text-desc text-gray-400 dark:text-gray-dark-400">MasterCard</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-normal font-semibold text-gray-1100 mb-4 dark:text-gray-dark-1100">$446.61</p>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">985 sales</p>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 overflow-hidden rounded-lg"><img class="w-full h-full object-cover" src="assets/images/seller-avatar-4.png" alt="seller avatar"></div>
                    <div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100 mb-4">Jenny Wilson</p>
                      <p class="text-desc text-gray-400 dark:text-gray-dark-400">Pizza Hut</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-normal font-semibold text-gray-1100 mb-4 dark:text-gray-dark-1100">$406.27</p>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">875 sales</p>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 overflow-hidden rounded-lg"><img class="w-full h-full object-cover" src="assets/images/seller-avatar-5.png" alt="seller avatar"></div>
                    <div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100 mb-4">Leslie Alexander</p>
                      <p class="text-desc text-gray-400 dark:text-gray-dark-400">Apple</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-normal font-semibold text-gray-1100 mb-4 dark:text-gray-dark-1100">$396.84</p>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">630 sales</p>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 overflow-hidden rounded-lg"><img class="w-full h-full object-cover" src="assets/images/seller-avatar-6.png" alt="seller avatar"></div>
                    <div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100 mb-4">Kristin Watson</p>
                      <p class="text-desc text-gray-400 dark:text-gray-dark-400">Starbucks</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-normal font-semibold text-gray-1100 mb-4 dark:text-gray-dark-1100">$351.02</p>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">563 sales</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg overflow-scroll scrollbar-hide p-[25px] mb-[33px]">
            <div class="flex items-center justify-between pb-4 border-neutral border-b mb-5 dark:border-dark-neutral-border">
              <p class="text-subtitle-semibold font-semibold text-gray-1100 dark:text-gray-dark-1100">Recent Purchases</p>
              <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                </label>
                <ul class="dropdown-content" tabindex="0">
                  <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                    <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                    <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                    </li>
                    <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                    </li>
                    <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                    </li>
                    <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                    </li>
                    <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                    <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                    </li>
                  </div>
                </ul>
              </div>
            </div>
            <table class="w-full min-w-[900px]">
              <thead>
                <tr class="border-b border-neutral dark:border-dark-neutral-border pb-[15px]">
                  <th class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[6px]" type="checkbox">
                  </th>
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Products</th>
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Order ID</th>
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Date</th>
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Customer name</th>
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Status</th>
                  <th class="font-normal text-normal text-gray-400 text-left pb-[15px] dark:text-gray-dark-400">Amount</th>
                  <th class="font-normal text-normal text-gray-400 text-center pb-[15px] dark:text-gray-dark-400">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>MacBook Pro</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-1.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Bessie Cooper</p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-green"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Delivered</p>
                    </div>
                  </td>
                  <td><span>$400.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>iPhone 11 Pro</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-2.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Annette Black</p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-orange"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Pending</p>
                    </div>
                  </td>
                  <td><span>$200.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>Oppo A20</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-3.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Erling Halland</p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-green"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Delivered</p>
                    </div>
                  </td>
                  <td><span>$250.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>Oppo A20</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-4.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Kristin Watson</p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-red"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Canceled</p>
                    </div>
                  </td>
                  <td><span>$400.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>MacBook Pro</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-5.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Esther Howard</p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-green"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Delivered</p>
                    </div>
                  </td>
                  <td><span>$400.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>iPhone 11 Pro</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-2.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Jerome Bell</p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-orange"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Pending</p>
                    </div>
                  </td>
                  <td><span>$200.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="border-b text-normal text-gray-1100 border-neutral dark:border-dark-neutral-border dark:text-gray-dark-1100">
                  <td class="text-left">
                    <input class="checkbox checkbox-primary rounded border-2 w-[18px] h-[18px] mb-[-6px]" type="checkbox">
                  </td>
                  <td class="py-[17px]"><span>Oppo A20</span></td>
                  <td><span>#25413</span></td>
                  <td><span>Aug 5th, 2021</span></td>
                  <td>
                    <div class="flex items-center gap-2">
                      <div class="w-6 h-6 rounded-full overflow-hidden"><img src="assets/images/seller-avatar-6.png" alt="user avatar"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Brooklyn </p>
                    </div>
                  </td>
                  <td>
                    <div class="flex items-center gap-x-2">
                      <div class="w-2 h-2 rounded-full bg-red"></div>
                      <p class="text-normal text-gray-1100 dark:text-gray-dark-1100">Canceled</p>
                    </div>
                  </td>
                  <td><span>$400.00</span></td>
                  <td>
                    <div class="dropdown dropdown-end w-full">
                      <label class="cursor-pointer dropdown-label flex items-center justify-between p-3" tabindex="0"><img class="mx-auto cursor-pointer" src="assets/images/icons/icon-more.svg" alt="more icon">
                      </label>
                      <ul class="dropdown-content" tabindex="0">
                        <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                          <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px] show-detail" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">View details</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Pending</span></a>
                          </li>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Completed</span></a>
                          </li>
                          <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                          <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Cancel</span></a>
                          </li>
                        </div>
                      </ul>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg flex-1 p-[25px]">
              <div class="flex items-center justify-between pb-3 border-neutral border-b mb-5 dark:border-dark-neutral-border">
                <p class="text-subtitle-semibold font-semibold text-gray-1100 dark:text-gray-dark-1100">Market Overview</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="grid grid-cols-7 gap-x-[27.45px]">
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-gray-400 dark:text-gray-dark-400">Mon</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-gray-400 dark:text-gray-dark-400">Tue</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-gray-400 dark:text-gray-dark-400">Wed</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-gray-400 dark:text-gray-dark-400">Thu</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-gray-400 dark:text-gray-dark-400">Fri</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-red dark:text-red">Sat</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
                <div class="flex flex-col-reverse gap-y-[10px]">
                  <p class="text-xs text-red dark:text-red">Sun</p>
                  <div class="relative bg-neutral rounded-[10px] dark:bg-dark-neutral-border h-[198px] max-w-[21.12px]">
                    <div class="w-full block bg-color-brands absolute bottom-0 rounded-[10px] h-[50%]"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg flex-1 p-[25px]">
              <div class="flex items-center justify-between pb-3 border-neutral border-b mb-5 dark:border-dark-neutral-border">
                <p class="text-subtitle-semibold font-semibold text-gray-1100 dark:text-gray-dark-1100">Visits by Source</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div>
                <div>
                  <canvas class="max-h-[240px] lg:max-h-[123px] xl:max-h-[200px]" width="400" height="400" id="visitChart"></canvas>
                </div>
              </div>
              <p class="text-desc text-gray-500 mt-3 dark:text-gray-dark-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="rounded-2xl border border-neutral bg-neutral-bg dark:border-dark-neutral-border dark:bg-dark-neutral-bg flex-1 p-[25px]">
              <div class="flex items-center justify-between pb-3 border-neutral border-b mb-5 dark:border-dark-neutral-border">
                <p class="text-subtitle-semibold font-semibold text-gray-1100 dark:text-gray-dark-1100">Total Revenue</p>
                <div class="dropdown dropdown-end ml-auto translate-x-4 z-10">
                  <label class="cursor-pointer dropdown-label flex items-center justify-between py-2 px-4" tabindex="0"><img class="cursor-pointer" src="assets/images/icons/icon-toggle.svg" alt="toggle icon">
                  </label>
                  <ul class="dropdown-content" tabindex="0">
                    <div class="relative menu rounded-box dropdown-shadow min-w-[126px] bg-neutral-bg mt-[10px] pt-[14px] pb-[7px] px-4 border border-neutral-border  dark:text-gray-dark-500 dark:border-dark-neutral-border dark:bg-dark-neutral-bg">
                      <div class="border-solid border-b-8 border-x-transparent border-x-8 border-t-0 absolute w-[14px] top-[-7px] border-b-transparent right-[18px]"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Sales report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Export report</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Profit manage</span></a>
                      </li>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#"> <span class="text-gray-500 text-[11px] leading-4 hover:text-gray-700">Revenue report</span></a>
                      </li>
                      <div class="w-full bg-neutral h-[1px] my-[7px] dark:bg-dark-neutral-border"></div>
                      <li class="text-normal mb-[7px]"><a class="flex items-center bg-transparent p-0 gap-[7px]" href="#remove"> <span class="text-red text-[11px] leading-4">Remove widget</span></a>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>
              <div>
                <div>
                  <canvas class="max-h-[240px] lg:max-h-[123px] xl:max-h-[200px]" width="400" height="400" id="revenueChart"></canvas>
                </div>
              </div>
              <p class="text-desc text-gray-500 mt-3 dark:text-gray-dark-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
          <label class="btn modal-button absolute left-[-1000px]" for="details-modal">details</label>
          <input class="modal-toggle" type="checkbox" id="details-modal">
          <div class="modal">
            <div class="modal-box relative bg-neutral-bg scrollbar-hide dark:bg-dark-neutral-bg">
              <label class="absolute right-2 top-2 cursor-pointer" for="details-modal"><img src="assets/images/icons/icon-close-modal.svg" alt="close modal button"></label>
              <h6 class="text-header-6 font-semibold text-gray-500 dark:text-gray-dark-500 mb-[49px]">Transaction Details</h6>
              <div class="flex items-center gap-6 mb-10">
                <div> <img src="assets/images/nasa.png" alt="Nasa logo"></div>
                <div>
                  <p class="text-header-7 font-bold text-gray-1100 mb-2 dark:text-gray-dark-1100">Transfer $68.25 to Nasa.,JSC</p>
                  <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500 mb-[21px]">On 22 January 2022 At 15:39 GMT</p>
                  <div class="border border-neutral bg-transparent flex items-center gap-3 px-5 w-fit rounded-[72px] py-[12px]">
                    <div class="rounded-full w-[10px] h-[10px] bg-green"></div>
                    <p class="font-medium text-xs text-green">Active</p>
                  </div>
                </div>
              </div>
              <div class="flex items-end justify-between mb-[76px]">
                <div class="flex items-start gap-x-[10px]">
                  <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[#E8EDF2] dark:bg-[#313442]"><img class="dark:invert" src="assets/images/icons/icon-user.svg" alt="user icon"></div>
                  <div class="flex flex-col gap-y-2">
                    <p class="text-sm leading-4 text-gray-1100 font-semibold dark:text-gray-dark-1100">Send to</p>
                    <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500">Jane Cooper</p>
                    <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500">E-mail: tim.jennings@example.com</p>
                    <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500">Phone: +099 856 245</p>
                  </div>
                </div>
                <div class="capitalize text-xs text-color-brands py-2 rounded-lg px-[13.5px] bg-[#E8EDF2] dark:bg-[#313442] max-w-[114px]">$ 68,125.25</div>
              </div>
              <div class="flex items-end justify-between mb-2">
                <div class="flex items-start gap-x-[10px]">
                  <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[#E8EDF2] dark:bg-[#313442]"><img class="dark:invert" src="assets/images/icons/icon-home-hashtag.svg" alt="home icon"></div>
                  <div class="flex flex-col gap-y-2">
                    <p class="text-sm leading-4 text-gray-1100 font-semibold dark:text-gray-dark-1100">Bank Details</p>
                    <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500">967-400 026789758</p>
                    <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500">Sparkasse credit</p>
                    <p class="text-sm leading-4 text-gray-500 dark:text-gray-dark-500">Invoice ID: #12546872</p>
                  </div>
                </div>
                <div class="capitalize text-xs text-color-brands py-2 rounded-lg px-[13.5px] bg-[#E8EDF2] dark:bg-[#313442] max-w-[114px]">$250</div>
              </div>
              <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border mb-[67px]"></div>
              <div class="flex items-center justify-between flex-wrap gap-3">
                <div class="flex items-center gap-[15px]">
                  <button class="border-0 capitalize font-semibold py-4 px-8 text-gray-500 bg-neutral flex items-center gap-2 text-[12px] leading-[21px] dark:text-gray-dark-500 dark:bg-dark-neutral-border hover:opacity-80 rounded-[10px]">
                    <p>Print</p><i> <img src="assets/images/icons/icon-printer.svg" alt="print icon"></i>
                  </button>
                  <button class="bg-transparent font-semibold flex items-center text-[12px] leading-[21px] dark:text-gray-dark-500 hover:opacity-80 rounded-[10px] gap-[10px]">
                    <p>Download Pdf</p><i> <img src="assets/images/icons/icon-down.svg" alt="down icon"></i>
                  </button>
                </div>
                <button class="border-0 capitalize font-semibold py-4 px-8 text-gray-500 bg-neutral flex items-center gap-2 text-[12px] leading-[21px] dark:text-gray-dark-500 dark:bg-dark-neutral-border hover:opacity-80 rounded-[10px]">
                  <p>Issue Refund</p><i> <img src="assets/images/icons/icon-refunds.svg" alt="print icon"></i>
                </button>
              </div>
            </div>
          </div>
          <label class="btn modal-button absolute left-[-1000px]" for="project-modal">project</label>
          <input class="modal-toggle" type="checkbox" id="project-modal">
          <div class="modal">
            <div class="modal-box relative bg-neutral-bg scrollbar-hide dark:bg-dark-neutral-bg pt-[53px]">
              <label class="absolute right-2 top-2 cursor-pointer" for="project-modal"><img src="assets/images/icons/icon-close-modal.svg" alt="close modal button"></label>
              <div class="flex items-center justify-center flex-col">
                <h6 class="text-header-6 font-semibold text-gray-500 text-center dark:text-gray-dark-500 mb-[38px]">Create a New Project</h6>
                <div class="cursor-pointer show-add-project-2"><img class="hover:opacity-80 mb-[29px] dark:hidden" src="assets/images/icons/add-project.svg" width="92" height="92" alt="add project icon"><img class="hidden hover:opacity-80 mb-[29px] dark:block" src="assets/images/icons/add-project-dark.svg" width="92" height="92" alt="add project icon"></div>
                <p class="text-sm leading-4 text-gray-1100 dark:text-gray-dark-1100 mb-[6px]">Blank project</p>
                <p class="text-desc text-gray-400 dark:text-gray-dark-400 mb-[61px]">Start from scratch</p>
                <div class="flex items-center gap-[6px]">
                  <button class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg w-fit dark:border-dark-neutral-bg py-[7px] px-[16.5px]">Templates</button>
                  <button class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-gray-500 hover:bg-white hover:text-black hover:border-gray-300 dark:hover:border-gray-dark-300 border-neutral-bg w-fit dark:border-dark-neutral-bg py-[7px] px-[19px]">Cancel</button>
                </div>
              </div>
            </div>
          </div>
          <label class="btn modal-button absolute left-[-1000px]" for="add-modal">add</label>
          <input class="modal-toggle" type="checkbox" id="add-modal">
          <div class="modal">
            <div class="modal-box relative bg-neutral-bg scrollbar-hide w-full dark:bg-dark-neutral-bg pt-[53px] max-w-[794px]">
              <label class="absolute right-2 top-2 cursor-pointer" for="add-modal"><img src="assets/images/icons/icon-close-modal.svg" alt="close modal button"></label>
              <div class="flex items-center justify-center flex-col">
                <h6 class="text-header-6 font-semibold text-gray-500 text-center dark:text-gray-dark-500 mb-[50px]">Create a New Project</h6>
                <div class="w-full flex flex-col max-w-[531px] gap-[30px] mb-[60px] lg:mb-[166px]">
                  <div class="border-dashed border-2 text-center border-neutral mx-auto cursor-pointer py-[26px] dark:border-dark-neutral-border w-full max-w-[724px]"><img class="mx-auto inline-block mb-[15px]" src="assets/images/icons/icon-image.svg" alt="image icon">
                    <p class="text-sm leading-6 text-gray-500 font-normal mb-[5px]">Drop your image here, or browse</p>
                    <p class="leading-6 text-gray-400 text-[13px]">JPG,PNG and GIF files are allowed</p>
                  </div>
                  <div class="w-full">
                    <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Project Name</p>
                    <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
                      <input class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit" type="text" placeholder="Type name here">
                    </div>
                  </div>
                  <div class="w-full">
                    <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Description</p>
                    <div class="rounded-lg border border-neutral flex flex-col dark:border-dark-neutral-border p-[13px] h-[218px]">
                      <div class="flex items-center gap-y-4 flex-col gap-x-[22px] mb-[31px] xl:flex-row xl:gap-y-0">
                        <div class="flex items-center gap-x-[14px]"><img class="cursor-pointer" src="assets/images/icons/icon-bold.svg" alt="bold icon"><img class="cursor-pointer" src="assets/images/icons/icon-italicized.svg" alt="italicized icon"><img class="cursor-pointer" src="assets/images/icons/icon-underlined.svg" alt="underlined icon"><img class="cursor-pointer" src="assets/images/icons/icon-strikethrough.svg" alt="strikethrough icon"><img class="cursor-pointer" src="assets/images/icons/icon-textcolor.svg" alt="textcolor icon"><img class="cursor-pointer" src="assets/images/icons/icon-backgroundcolor.svg" alt="backgroundcolor icon"><img class="cursor-pointer" src="assets/images/icons/icon-smile.svg" alt="smile icon"></div>
                        <div class="flex items-center gap-x-[14px]">
                          <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-paragraphformat.svg" alt="paragraphformat icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div>
                          <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-align-left.svg" alt="align left icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div>
                          <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-ordered-list.svg" alt="ordered list icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div>
                          <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-unordered-list.svg" alt="unordered list icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div><img class="cursor-pointer" src="assets/images/icons/icon-indent.svg" alt="indent icon"><img class="cursor-pointer opacity-40" src="assets/images/icons/icon-indent.svg" alt="outdent icon">
                        </div>
                        <div class="flex items-center gap-x-[14px]"><img class="cursor-pointer" src="assets/images/icons/icon-insert-image.svg" alt="insert image icon"><img class="cursor-pointer" src="assets/images/icons/icon-insert-link.svg" alt="insert link icon"><img class="cursor-pointer" src="assets/images/icons/icon-insert-file.svg" alt="insert-file icon"><img class="cursor-pointer" src="assets/images/icons/icon-insert-video.svg" alt="insert video icon"><img class="cursor-pointer opacity-40" src="assets/images/icons/icon-undo.svg" alt="undo icon"><img class="cursor-pointer opacity-40" src="assets/images/icons/icon-redo.svg" alt="redo icon"></div>
                      </div>
                      <textarea class="textarea w-full p-0 text-gray-400 resize-none rounded-none bg-transparent flex-1 focus:outline-none dark:text-gray-dark-400 placeholder:text-inherit" placeholder="Type description here"></textarea>
                    </div>
                  </div>
                  <div class="w-full">
                    <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Category</p>
                    <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
                      <input class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit" type="text" placeholder="Design system">
                    </div>
                  </div>
                  <div class="w-full">
                    <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Priority</p>
                    <div class="input-group border rounded-lg border-[#E8EDF2] dark:border-[#313442] sm:min-w-[252px]">
                      <input class="input bg-transparent text-sm leading-4 text-gray-400 h-fit min-h-fit py-4 focus:outline-none pl-[13px] dark:text-gray-dark-400 placeholder:text-inherit" type="text" placeholder="Urgent">
                    </div>
                  </div>
                  <div class="w-full">
                    <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Tag</p>
                    <div class="border bg-neutral-bg border-neutral dark:bg-dark-neutral-bg dark:border-dark-neutral-border rounded-lg p-[15px] mt-[10px] min-h-[107px]">
                      <div class="flex flex-wrap gap-[10px]">
                        <div class="flex items-center py-1 px-2 gap-x-[5px] mb-[10px] bg-[#E8EDF2] dark:bg-[#313442] rounded-[5px]"><span class="text-xs text-gray-400">smartwatch</span><img class="cursor-pointer" src="assets/images/icons/icon-close.svg" alt="close icon"></div>
                        <div class="flex items-center py-1 px-2 gap-x-[5px] mb-[10px] bg-[#E8EDF2] dark:bg-[#313442] rounded-[5px]"><span class="text-xs text-gray-400">Apple</span><img class="cursor-pointer" src="assets/images/icons/icon-close.svg" alt="close icon"></div>
                        <div class="flex items-center py-1 px-2 gap-x-[5px] mb-[10px] bg-[#E8EDF2] dark:bg-[#313442] rounded-[5px]"><span class="text-xs text-gray-400">Watch</span><img class="cursor-pointer" src="assets/images/icons/icon-close.svg" alt="close icon"></div>
                        <div class="flex items-center py-1 px-2 gap-x-[5px] mb-[10px] bg-[#E8EDF2] dark:bg-[#313442] rounded-[5px]"><span class="text-xs text-gray-400">smartphone</span><img class="cursor-pointer" src="assets/images/icons/icon-close.svg" alt="close icon"></div>
                        <div class="flex items-center py-1 px-2 gap-x-[5px] mb-[10px] bg-[#E8EDF2] dark:bg-[#313442] rounded-[5px]"><span class="text-xs text-gray-400">iPhone14 max</span><img class="cursor-pointer" src="assets/images/icons/icon-close.svg" alt="close icon"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <label class="btn modal-button absolute left-[-1000px]" for="share-modal">share</label>
          <input class="modal-toggle" type="checkbox" id="share-modal">
          <div class="modal">
            <div class="modal-box relative bg-neutral-bg scrollbar-hide w-full dark:bg-dark-neutral-bg pt-[53px] max-w-[738px] pr-[31px]">
              <label class="absolute right-2 top-2 cursor-pointer" for="share-modal"><img src="assets/images/icons/icon-close-modal.svg" alt="close modal button"></label>
              <div class="flex items-center justify-center flex-col">
                <h6 class="text-header-6 font-semibold text-gray-500 text-center dark:text-gray-dark-500 mb-[53px]">Share Duplicate of Creative requests</h6>
                <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border mb-10"></div>
                <div class="w-full mb-[65px]">
                  <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Invite link</p>
                  <div class="flex items-center justify-between rounded-md bg-neutral py-[11px] px-[10px] dark:bg-dark-neutral-border">
                    <p class="text-sm leading-4 text-gray-400 dark:text-gray-dark-400">foxy.com/ZmRzYSBmZHMgc2RmIHNkYWZzZ</p>
                    <div class="flex items-center text-blue gap-[6px]"><img src="assets/images/icons/Icon-link.svg" alt="link icon">
                      <p class="text-desc">Copy link</p>
                    </div>
                  </div>
                </div>
                <div class="w-full mb-[24px]">
                  <p class="text-gray-1100 text-base leading-4 font-medium capitalize mb-[10px] dark:text-gray-dark-1100">Invite with email</p>
                  <div class="flex items-center gap-5">
                    <input class="bg-transparent text-sm leading-4 text-gray-400 border border-neutral flex-1 rounded-md focus:outline-none p-[10px] dark:text-gray-dark-400 placeholder:text-inherit dark:border-dark-neutral-border" type="text" placeholder="Add project members by name or email">
                    <button class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg dark:border-dark-neutral-bg py-[11px] px-[23px]">Invite</button>
                  </div>
                </div>
                <div class="w-full flex items-center justify-between mb-[30px]">
                  <div class="flex items-center gap-3"> <a class="block rounded-full border-neutral overflow-hidden border-[1.4px] dark:border-gray-dark-100 w-9 h-9 border-none" href="seller-details.html"><img class="w-full h-full object-cover" src="assets/images/avatar-layouts-1.png" alt="user avatar"></a>
                    <p class="text-sm leading-4 text-gray-400 dark:text-gray-dark-400">Theresa Webb</p>
                  </div>
                  <p class="text-sm leading-4 text-gray-400 dark:text-gray-dark-400">Owner</p>
                </div>
                <div class="w-full bg-neutral h-[1px] dark:bg-dark-neutral-border mb-[35px]"></div>
                <div class="w-full mb-[42px]">
                  <p class="text-subtitle font-medium text-gray-1100 mb-8 dark:text-gray-dark-1100">Members</p>
                  <div class="flex flex-col items-center gap-6 w-full">
                    <div class="flex items-center justify-between w-full">
                      <div class="flex items-center gap-3"><a class="block rounded-full border-neutral overflow-hidden border-[1.4px] dark:border-gray-dark-100 w-9 h-9 border-none" href="seller-details.html"><img class="w-full h-full object-cover" src="assets/images/avatar-layouts-2.png" alt="user avatar"></a>
                        <div>
                          <p class="text-normal text-gray-1100 mb-[2px] dark:text-gray-dark-1100">Bessie Cooper</p>
                          <p class="text-desc text-gray-400 dark:text-gray-dark-400">binhan628@gmail.com</p>
                        </div>
                      </div>
                      <select class="select text-gray-500 pl-1 font-normal h-fit min-h-fit dark:text-gray-dark-500 focus:outline-0 select-caret">
                        <option>Can Edit</option>
                        <option>Can View</option>
                      </select>
                    </div>
                    <div class="flex items-center justify-between w-full">
                      <div class="flex items-center gap-3"><a class="block rounded-full border-neutral overflow-hidden border-[1.4px] dark:border-gray-dark-100 w-9 h-9 border-none" href="seller-details.html"><img class="w-full h-full object-cover" src="assets/images/avatar-layouts-3.png" alt="user avatar"></a>
                        <div>
                          <p class="text-normal text-gray-1100 mb-[2px] dark:text-gray-dark-1100">Cameron Williamson</p>
                          <p class="text-desc text-gray-400 dark:text-gray-dark-400">trungkienspktnd@gamail.com</p>
                        </div>
                      </div>
                      <select class="select text-gray-500 pl-1 font-normal h-fit min-h-fit dark:text-gray-dark-500 focus:outline-0 select-caret">
                        <option>Can Edit</option>
                        <option>Can View</option>
                      </select>
                    </div>
                    <div class="flex items-center justify-between w-full">
                      <div class="flex items-center gap-3"><a class="block rounded-full border-neutral overflow-hidden border-[1.4px] dark:border-gray-dark-100 w-9 h-9 border-none" href="seller-details.html"><img class="w-full h-full object-cover" src="assets/images/avatar-layouts-4.png" alt="user avatar"></a>
                        <div>
                          <p class="text-normal text-gray-1100 mb-[2px] dark:text-gray-dark-1100">Jacob Jones</p>
                          <p class="text-desc text-gray-400 dark:text-gray-dark-400">manhhachkt08@gmail.com</p>
                        </div>
                      </div>
                      <select class="select text-gray-500 pl-1 font-normal h-fit min-h-fit dark:text-gray-dark-500 focus:outline-0 select-caret">
                        <option>Can Edit</option>
                        <option>Can View</option>
                      </select>
                    </div>
                    <div class="flex items-center justify-between w-full">
                      <div class="flex items-center gap-3"><a class="block rounded-full border-neutral overflow-hidden border-[1.4px] dark:border-gray-dark-100 w-9 h-9 border-none" href="seller-details.html"><img class="w-full h-full object-cover" src="assets/images/avatar-layouts-5.png" alt="user avatar"></a>
                        <div>
                          <p class="text-normal text-gray-1100 mb-[2px] dark:text-gray-dark-1100">Arlene McCoy</p>
                          <p class="text-desc text-gray-400 dark:text-gray-dark-400">tienlapspktnd@gmail.com</p>
                        </div>
                      </div>
                      <select class="select text-gray-500 pl-1 font-normal h-fit min-h-fit dark:text-gray-dark-500 focus:outline-0 select-caret">
                        <option>Can Edit</option>
                        <option>Can View</option>
                      </select>
                    </div>
                    <div class="flex items-center justify-between w-full">
                      <div class="flex items-center gap-3"><a class="block rounded-full border-neutral overflow-hidden border-[1.4px] dark:border-gray-dark-100 w-9 h-9 border-none" href="seller-details.html"><img class="w-full h-full object-cover" src="assets/images/avatar-layouts-1.png" alt="user avatar"></a>
                        <div>
                          <p class="text-normal text-gray-1100 mb-[2px] dark:text-gray-dark-1100">Brooklyn Simmons</p>
                          <p class="text-desc text-gray-400 dark:text-gray-dark-400">tranthuy.nute@gmail.com</p>
                        </div>
                      </div>
                      <select class="select text-gray-500 pl-1 font-normal h-fit min-h-fit dark:text-gray-dark-500 focus:outline-0 select-caret">
                        <option>Can Edit</option>
                        <option>Can View</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <label class="btn modal-button absolute left-[-1000px]" for="mail-modal">mail</label>
          <input class="modal-toggle" type="checkbox" id="mail-modal">
          <div class="modal">
            <div class="modal-box relative bg-neutral-bg scrollbar-hide w-full dark:bg-dark-neutral-bg pt-[38px] max-w-[650px] pl-[45px]">
              <label class="absolute right-2 top-2 cursor-pointer" for="mail-modal"><img src="assets/images/icons/icon-close-modal.svg" alt="close modal button"></label>
              <div class="flex items-center justify-center flex-col">
                <h6 class="w-full text-header-6 font-semibold text-gray-500 dark:text-gray-dark-500 mb-[39px]">New Mesage</h6>
                <div class="flex items-center gap-4 flex-col w-full">
                  <div class="flex items-center rounded-lg border border-neutral justify-between w-full flex-wrap gap-3 py-[13px] px-[10px] dark:border-dark-neutral-border">
                    <div class="flex items-center">
                      <p class="text-sm leading-4 text-gray-400 dark:text-gray-dark-400 pr-5">To:</p>
                      <div class="flex items-center flex-wrap gap-[5px]">
                        <div class="flex items-center rounded gap-[5px] py-[6px] pl-[10px] pr-[5px] bg-neutral dark:bg-dark-neutral-border"><img class="rounded-full w-4 h-4" src="assets/images/seller-avatar-2.png" alt="user avatar">
                          <p class="font-medium text-gray-400 text-[10px] leading-[15px] dark:text-gray-dark-400">Steven Job</p>
                          <svg class="fill-gray-400 cursor-pointer dark:fill-gray-dark-400" width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.20003 8.00001L4.80003 10.4L5.60003 11.2L8.00002 8.80001L10.4 11.2L11.2 10.4L8.80002 8.00001L11.2 5.60001L10.4 4.80001L8.00002 7.20001L5.6 4.79999L4.8 5.59999L7.20003 8.00001Z"></path>
                          </svg>
                        </div>
                        <div class="flex items-center rounded gap-[5px] py-[6px] pl-[10px] pr-[5px] bg-neutral dark:bg-dark-neutral-border"><img class="rounded-full w-4 h-4" src="assets/images/seller-avatar-3.png" alt="user avatar">
                          <p class="font-medium text-gray-400 text-[10px] leading-[15px] dark:text-gray-dark-400">Hailen</p>
                          <svg class="fill-gray-400 cursor-pointer dark:fill-gray-dark-400" width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.20003 8.00001L4.80003 10.4L5.60003 11.2L8.00002 8.80001L10.4 11.2L11.2 10.4L8.80002 8.00001L11.2 5.60001L10.4 4.80001L8.00002 7.20001L5.6 4.79999L4.8 5.59999L7.20003 8.00001Z"></path>
                          </svg>
                        </div>
                        <div class="flex items-center rounded gap-[5px] py-[6px] pl-[10px] pr-[5px] bg-neutral dark:bg-dark-neutral-border"><img class="rounded-full w-4 h-4" src="assets/images/seller-avatar-4.png" alt="user avatar">
                          <p class="font-medium text-gray-400 text-[10px] leading-[15px] dark:text-gray-dark-400">Azumi Rose</p>
                          <svg class="fill-gray-400 cursor-pointer dark:fill-gray-dark-400" width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.20003 8.00001L4.80003 10.4L5.60003 11.2L8.00002 8.80001L10.4 11.2L11.2 10.4L8.80002 8.00001L11.2 5.60001L10.4 4.80001L8.00002 7.20001L5.6 4.79999L4.8 5.59999L7.20003 8.00001Z"></path>
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center gap-[6px]">
                      <p class="font-medium text-gray-400 cursor-pointer text-[10px] leading-[15px] dark:text-gray-dark-400 hover:text-color-brands dark:hover:text-color-brands">Cc</p>
                      <p class="font-medium text-gray-400 cursor-pointer text-[10px] leading-[15px] dark:text-gray-dark-400 hover:text-color-brands dark:hover:text-color-brands">Bcc</p>
                    </div>
                  </div>
                  <div class="rounded-lg border border-neutral justify-between w-full py-[16px] px-[13px] dark:border-dark-neutral-border">
                    <input class="input bg-transparent text-sm leading-4 text-gray-400 p-0 w-full h-4 rounded-none focus:outline-none dark:text-gray-dark-400 placeholder:text-inherit" type="text" placeholder="Subject">
                  </div>
                  <div class="rounded-lg border border-neutral flex flex-col dark:border-dark-neutral-border p-[13px] h-[262px] w-full">
                    <div class="flex items-center gap-y-4 flex-col gap-x-[22px] mb-[31px] xl:flex-row xl:gap-y-0">
                      <div class="flex items-center gap-x-[14px]"><img class="cursor-pointer" src="assets/images/icons/icon-bold.svg" alt="bold icon"><img class="cursor-pointer" src="assets/images/icons/icon-italicized.svg" alt="italicized icon"><img class="cursor-pointer" src="assets/images/icons/icon-underlined.svg" alt="underlined icon"><img class="cursor-pointer" src="assets/images/icons/icon-strikethrough.svg" alt="strikethrough icon"><img class="cursor-pointer" src="assets/images/icons/icon-textcolor.svg" alt="textcolor icon"><img class="cursor-pointer" src="assets/images/icons/icon-backgroundcolor.svg" alt="backgroundcolor icon"><img class="cursor-pointer" src="assets/images/icons/icon-smile.svg" alt="smile icon"></div>
                      <div class="flex items-center gap-x-[14px]">
                        <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-paragraphformat.svg" alt="paragraphformat icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div>
                        <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-align-left.svg" alt="align left icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div>
                        <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-ordered-list.svg" alt="ordered list icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div>
                        <div class="flex items-center cursor-pointer gap-x-[1.5px]"><img src="assets/images/icons/icon-unordered-list.svg" alt="unordered list icon"><img src="assets/images/icons/icon-arrow-down-triangle.svg" alt="arrow down triangle icon"></div><img class="cursor-pointer" src="assets/images/icons/icon-indent.svg" alt="indent icon"><img class="cursor-pointer opacity-40" src="assets/images/icons/icon-indent.svg" alt="outdent icon">
                      </div>
                      <div class="flex items-center gap-x-[14px]"><img class="cursor-pointer" src="assets/images/icons/icon-insert-image.svg" alt="insert image icon"><img class="cursor-pointer" src="assets/images/icons/icon-insert-link.svg" alt="insert link icon"><img class="cursor-pointer" src="assets/images/icons/icon-insert-file.svg" alt="insert-file icon"><img class="cursor-pointer" src="assets/images/icons/icon-insert-video.svg" alt="insert video icon"><img class="cursor-pointer opacity-40" src="assets/images/icons/icon-undo.svg" alt="undo icon"><img class="cursor-pointer opacity-40" src="assets/images/icons/icon-redo.svg" alt="redo icon"></div>
                    </div>
                    <textarea class="textarea w-full p-0 text-gray-400 resize-none rounded-none bg-transparent flex-1 focus:outline-none dark:text-gray-dark-400 placeholder:text-inherit" placeholder="Content here"></textarea>
                  </div>
                  <div class="flex items-center w-full gap-[15px]">
                    <button class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 bg-color-brands hover:bg-color-brands hover:border-[#B2A7FF] dark:hover:border-[#B2A7FF] border-neutral-bg font-medium dark:border-dark-neutral-bg py-[7px] px-[24px] text-[12px] leading-[18px]">Send</button>
                    <button class="btn normal-case h-fit min-h-fit transition-all duration-300 border-4 border-neutral-bg bg-gray-200 font-medium text-gray-500 dark:border-dark-neutral-bg py-[7px] px-[17px] dark:bg-gray-dark-200 text-[12px] leading-[18px] dark:text-gray-dark-500 hover:bg-gray-200 dark:hover:bg-gray-dark-200 hover:border-gray-300 dark:hover:border-gray-dark-300">Save Darft</button>
                    <p class="text-desc text-gray-400 dark:text-gray-dark-400">Schedule</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- write your code here-->
@endsection
@push('script')
    <script type="text/javascript" src="assets/scripts/chart-utils.min.js"></script>
    <script type="text/javascript" src="assets/scripts/chart.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/chartjs-chart-geo@3"></script>
>>>>>>> 3297bc6d97ef58cc42acece89cf820f3a43d037b
@endpush
