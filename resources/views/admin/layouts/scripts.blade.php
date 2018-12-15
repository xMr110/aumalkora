<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->


<script src="/assets/backend/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap popper Core JavaScript -->
<script src="/assets/backend/plugins/bootstrap/js/popper.min.js"></script>

<script src="/assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Custom JavaScript -->
<script src="/assets/backend/semantic/semantic.js"></script>


<!-- slimscrollbar scrollbar JavaScript -->
<script src="/assets/backend/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="/assets/backend/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/assets/backend/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="/assets/backend/js/custom.min.js"></script>


<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--sparkline JavaScript -->
<script src="/assets/backend/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--c3 JavaScript -->
<script src="/assets/backend/plugins/d3/d3.min.js"></script>
<script src="/assets/backend/plugins/c3-master/c3.min.js"></script>
<!-- Popup message jquery -->
<script src="/assets/backend/plugins/toast-master/js/jquery.toast.js"></script>

<!-- Sweet-Alert  -->
<script src="/assets/backend/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/assets/backend/plugins/moment/moment.js"></script>
<script src="/assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<script>

    $('#date-format').bootstrapMaterialDatePicker({format: 'dddd DD MMMM YYYY - HH:mm'});

    $('[data-delete]').click(function (e) {
        e.preventDefault();

        swal({
            title: "Are You Sure?",
            text: "You Can't Undo This Action !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).parent().find('> #delete').submit();
                } else {

                }
            });

    });

    $('[data-editable]').click(function () {

        $.ajax({
            type: 'POST',
            url: $(this).data('action'),
            context: this,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function (data) {
                console.log(data);
                var message = '';
                if (data.status) {
                    if (data.type == 'active') {
                        $(this).find('i').removeClass('mdi-eye').addClass('mdi-eye-off');
                        message = 'It is Visible Now!';
                    } else if (data.type == 'home') {
                        $(this).find('i').removeClass('mdi-star').addClass('mdi-star-off');
                        message = 'It is Visible on Home Now!';
                    }

                } else {
                    if (data.type == 'active') {
                        $(this).find('i').removeClass('mdi-eye-off').addClass('mdi-eye');
                        message = 'It is Hidden Now';
                    } else if (data.type == 'home') {
                        $(this).find('i').removeClass('mdi-star-off').addClass('mdi-star');
                        message = 'It is Hidden From Home Now!';
                    }

                }

                swal(message, '', "success");
            }
        })
    });

    $('[data-logout]').click(function (e) {
        e.preventDefault();
        swal({
            title: "Are You Sure You Want Logout",
            text: "Hope we See You Soon ..",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).parent().find('> form').submit();
                } else {

                }
            });
    });


</script>


<script src="/assets/backend/plugins/tinymce/tinymce.min.js"></script>

<script !src="">
    $(document).ready(function () {

        if ($(".mymce").length > 0) {
            tinymce.init({
                selector: "textarea.mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
</script>


{{--<script>--}}
    {{--$('[notification]').click(function (e) {--}}
        {{--e.preventDefault();--}}
        {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: '{{ action('Admin\NotificationController@markAsRead') }}',--}}
            {{--context: this,--}}
            {{--data: {--}}
                {{--'note_id': $(this).data('noteid'),--}}
                {{--'_token': '{{ csrf_token() }}'--}}
            {{--},--}}
            {{--success: function (data) {--}}
                {{--location.href = $(this).attr('href');--}}
            {{--}--}}

        {{--});--}}
    {{--});--}}

    {{--$('[markAllRead]').click(function (e) {--}}
        {{--e.preventDefault();--}}

        {{--swal({--}}
            {{--title: "Are You Sure ?",--}}
            {{--text: "All Notification will mark as readed !",--}}
            {{--icon: "warning",--}}
            {{--buttons: true,--}}
            {{--dangerMode: true,--}}
        {{--}).then((willDelete) => {--}}
            {{--if (willDelete) {--}}
                {{--$.ajax({--}}
                    {{--type: 'POST',--}}
                    {{--url: '{{ action('Admin\NotificationController@markAllRead') }}',--}}
                    {{--context: this,--}}
                    {{--data: {--}}
                        {{--'_token': '{{ csrf_token() }}',--}}
                    {{--},--}}
                    {{--success: function (data) {--}}
                        {{--$(this).parent().html("there is no notification");--}}
                        {{--$('.message-center').remove();--}}
                        {{--$('.heartbit').remove();--}}
                        {{--$('.point').remove();--}}

                        {{--swal({--}}
                            {{--title: "All Notification marked as Readed!",--}}
                            {{--icon: "success",--}}
                            {{--button: "OK!",--}}
                        {{--});--}}
                    {{--}--}}
                {{--});--}}
            {{--} else {--}}
                {{--swal("Canceled");--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}

{{--</script>--}}