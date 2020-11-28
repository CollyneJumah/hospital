<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/Chart.bundle.js') }}"></script>
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
    $(document).ready( function(){
        $('#selectPatient').on('change', function(){
            let patient_id  = $(this).val()
            console.log(patient_id)
            if(patient_id)
            {
                $.ajax({
                    url:'{!!URL::to("getPatientEmailAndPhone")!!}',
                    type:'GET',
                    dataType:"json",
                    data: {'id':patient_id},
                    success: function(data)
                    {
                        console.log(data.email)
                        $('#patientEmail').val(data.email)
                        $('#patientPhone').val(data.phone)
                    }
                })
            }
        })
    })
</script>