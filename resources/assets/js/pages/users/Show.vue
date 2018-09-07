<template>
  <div>
    <!-- ============================================ -->
    <!-- Table -->
    <!-- ============================================ -->
    <div class="table-responsive">
    <table id="users-table" class="table table-hover table-xl mb-0">
        <thead>
        <tr>
            <th class="border-top-0">Status</th>
            <th class="border-top-0">Invoice#</th>
            <th class="border-top-0">Customer Name</th>
            <th class="border-top-0">Products</th>
            <th class="border-top-0">Categories</th>
            <th class="border-top-0">Shipping</th>
            <th class="border-top-0">Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Paid</td>
            <td class="text-truncate"><a href="#">INV-001001</a></td>
            <td class="text-truncate">
            <span class="avatar avatar-xs">
                <img class="box-shadow-2" src="app-assets/images/portrait/small/avatar-s-4.png"
                alt="avatar">
            </span>
            <span>Elizabeth W.</span>
            </td>
            <td class="text-truncate p-1">
            <ul class="list-unstyled users-list m-0">
                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons"
                class="avatar avatar-sm pull-up">
                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                src="app-assets/images/portfolio/portfolio-1.jpg"
                alt="Avatar">
                </li>
                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres"
                class="avatar avatar-sm pull-up">
                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                src="app-assets/images/portfolio/portfolio-2.jpg"
                alt="Avatar">
                </li>
                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones"
                class="avatar avatar-sm pull-up">
                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                src="app-assets/images/portfolio/portfolio-4.jpg"
                alt="Avatar">
                </li>
                <li class="avatar avatar-sm">
                <span class="badge badge-info">+1 more</span>
                </li>
            </ul>
            </td>
            <td>
            <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
            </td>
            <td>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 25%"
                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </td>
            <td class="text-truncate">$ 1200.00</td>
        </tr>
        <tr>
            <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>                          Pending</td>
            <td class="text-truncate"><a href="#">INV-001003</a></td>
            <td class="text-truncate">
            <span class="avatar avatar-xs">
                <img class="box-shadow-2" src="app-assets/images/portrait/small/avatar-s-6.png"
                alt="avatar">
            </span>
            <span>Megan S.</span>
            </td>
            <td class="text-truncate p-1">
            <ul class="list-unstyled users-list m-0">
                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons"
                class="avatar avatar-sm pull-up">
                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                src="app-assets/images/portfolio/portfolio-2.jpg"
                alt="Avatar">
                </li>
                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres"
                class="avatar avatar-sm pull-up">
                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                src="app-assets/images/portfolio/portfolio-5.jpg"
                alt="Avatar">
                </li>
            </ul>
            </td>
            <td>
            <button type="button" class="btn btn-sm btn-outline-success round">Groceries</button>
            </td>
            <td>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </td>
            <td class="text-truncate">$ 3200.00</td>
        </tr>
        </tbody>
    </table>
    </div>
  </div>
</template>

<script>

</script>
