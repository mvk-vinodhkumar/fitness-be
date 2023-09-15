<div>
    @if ($coachDetail->coach_tier === 'classic')
        <h5 style="color:white;"><span class="badge mt-2" style="background-color:#00ab4e;">Classic</span></h5>
    @elseif($coachDetail->coach_tier === 'supreme')
        <h5 style="color:white;"><span class="badge mt-2" style="background-color:#1a70d1;">Supreme</span></h5>
    @elseif($coachDetail->coach_tier === 'exclusive')
        <h5 style="color:white;"><span class="badge mt-2" style="background-color:#bc4244;">Exclusive</span></h5>
    @else
        <h5 style="color:white; "><span class="badge mt-2" style="background-color:#00d3cd;">LivEzy Plus</span></h5>
    @endif
</div>
