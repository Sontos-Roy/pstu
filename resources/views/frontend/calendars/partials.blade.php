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
                    @forelse ($dates as $data)
                    <tr>
                        <td>1st Year BBA 2nd Sem.(28th Batch)</td>
                        <td>2021-2022</td>
                        <td>05-02-2023</td>
                        <td>12-03-2023</td>
                        <td>30-04-2023</td>
                        <td>11-05-2023</td>
                        <td></td>
                        <td>21-05-2023</td>
                        <td>22-06-2023</td>
                    </tr>
                    @empty
                    <h2>Empty</h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
