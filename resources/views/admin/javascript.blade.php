$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('get_community_data') }}",
        "columns" : [
            { "data" : "community_name"},
            { "data" : "community_desc"},
            { "data" : "is_active"},
            { 
              data: 'id', 
              render: function ( data, type, row ) {
               return '<a href="{{url('/Superadmin/community')}}/'+data+'/edit">Action</a>';
               }
            },
         ]
    } );
} );