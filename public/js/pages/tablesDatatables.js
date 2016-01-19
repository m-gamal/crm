/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('.example-datatable').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#example-datatable').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#plan-search-result').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#leave-request-search-result').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#customers-table').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#managers-table').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#products-table').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#sales-table').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('#mr-lines-table').dataTable({
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('.ibns-datatable').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('.pos-datatable').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            $('.ucp-datatable').dataTable({
                columnDefs: [ { orderable: false, targets: [0] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
        }
    };
}();