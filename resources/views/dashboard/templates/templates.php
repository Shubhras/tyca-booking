<script id="adminDashboardTemplate" type="text/x-jsrender">

<tr>
    <td>
               <div class="d-flex align-items-center">
            <div class="image image-circle image-mini me-3">
                <img src="{{:image}}" alt="user" class="">
            </div>
            <div class="d-flex flex-column">
                <a href="{{:route}}"
                   class="text-dark mb-1 fs-6 text-decoration-none">
                    {{:name}}</a>
                <span class="text-dark fw-bold d-block">{{:email}}</span>
            </div>
       </div>
    </td>
        <td class="text-center">
        <span class="text-dark">{{:appointment_count}}</span>
    </td>
    <td class="text-center text-muted fw-bold">
        <span class="text-dark">
            {{:registered}}
        </span>
    </td>
</tr>





</script>
