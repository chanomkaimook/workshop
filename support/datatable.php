// * datatable initial
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Nickname</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    $('datatable').datatable()
</script>


// * ตัดคำใน td
<!-- ตัดคำใน td ย่อคำ ประโยค -->
<style>
    .truncate {
        max-width: inherit;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<script>
    columnDefs: [{
        "targets": 2,
        "className": "truncate"
    }, ]
</script>


// * ตัดคำตามจำนวน
// ! เมื่อ responsive ยังคงตัดคำ ซึ่งจะแสดงผลไม่ถูกต้อง
<script>
    columnDefs: [{
        "targets": [2, 3, 4],
        render: function(data, type, row) {
            return type === 'display' && data.length > 10 ?
                data.substr(0, 15) + '…' :
                data;
        }
    }]
</script>

// * เวลาทำ table responsive เลือก priority ที่จะแสดงให้เห็น
<script>
    columnDefs: [{
            responsivePriority: 1,
            targets: 0
        },

        {
            responsivePriority: 2,
            targets: 3
        },
    ]
</script>