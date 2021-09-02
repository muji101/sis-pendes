<script src="/dist/assets/js/feather-icons/feather.min.js"></script>
<script src="/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dist/assets/js/app.js"></script>

<script src="/dist/assets/vendors/chartjs/Chart.min.js"></script>
<script src="/dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="/dist/assets/js/pages/dashboard.js"></script>

<script src="/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="/dist/assets/js/vendors.js"></script>

<script src="/dist/assets/js/main.js"></script>

<!-- Include Choices JavaScript -->
<script src="/dist/assets/vendors/choices.js/choices.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


{{-- script otomatis modal jquery --}}
<script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);

            modal.find('.modal-body').load(button.data('remote'));
            modal.find('.modal-title').html(button.data('title'));
        });
    });
</script>

{{-- script modal bootstrap --}}
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>