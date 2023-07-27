<div class="col-md-3">
    <div class="aside">
        <div class="sidebar-item category">
            <div class="title">
                <h4>About University</h4>
            </div>
            <ul>
                <li><a href="{{ route('front.historic.outline') }}">Historical Outline</a></li>
                <li><a href="{{ route('front.university.glance') }}">University at a Glance</a></li>
                <li><a href="{{ route('front.honoris.causa') }}">Honoris Causa</a></li>
                <li><a href="{{ route('front.vice.chencellors.message', 'vice-chancellor') }}">Message from the Vice Chancellor</a></li>
                <li><a href="{{ route('front.vice.chencellors') }}">List of Vice Chancellors</a></li>
            </ul>
        </div>
        <div class="sidebar-item category">
            <div class="title">
                <h4>PSTU Leadership</h4>
            </div>
            <ul>
                @foreach (LeaderShips() as $item)
                <li><a href="{{ route('front.vice.chencellors.message', $item->slug) }}">{{ $item->designation }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-item category">
            <div class="title">
                <h4>Governance Framework</h4>
            </div>
            <ul>
                <li><a href="{{ route('front.university.ordinances') }}">University Ordinance</a></li>
            </ul>
        </div>
    </div>
</div>
