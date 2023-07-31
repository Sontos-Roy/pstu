<div class="col-sm-12" style="overflow-x:auto;">
    <div class="panel panel-default">
        <div class="panel-heading" style="color: white; background: #213e5e">Department of Accounting &amp; Information Systems</div>
        <div class="panel-body">
            <table class="table table-bordered table-style table-striped">
                <tbody>
                    <tr style="background: #213e5e;color: white">
                        <th class="width-15per">Exam. Name</th>
                        <th class="width-10per">Academic Year</th>
                        <th>Class Start Date</th>
                        <th>First Mid Term</th>
                        <th>Second Mid Term</th>
                        <th>Class Completion Date </th>
                        <th>Field Work Date </th>
                        <th>Final Exam Start Date</th>
                        <th class="width-10per">Final Exam End  Date (Appox.)</th>
                    </tr>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->academic_year }}</td>
                        <td>{{ $item->class_start }}</td>
                        <td>{{ $item->first_mid_term }}</td>
                        <td>{{ $item->second_mid_term }}</td>
                        <td>{{ $item->field_work }}</td>
                        <td>{{ $item->class_completion }}</td>
                        <td>{{ $item->final_exam_start }}</td>
                        <td>{{ $item->final_exam_end }}</td>
                    </tr>
                    @empty
                    <h2>Empty</h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
