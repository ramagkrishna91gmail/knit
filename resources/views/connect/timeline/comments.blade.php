<?php 
if($com->picture){
    $picture1 = $com->picture;
}else{
    $picture1 = 'https://via.placeholder.com/150?text='.$com->first_name;
}
?>

<div class="media" id="comment{{$com->id}}">
    <a class="media-left" href="#">
        <img class="media-object img-radius m-r-20"
            src="{{$picture1}}"
            alt="{{$com->first_name}}">
    </a>
    @if(Auth::user()->id == $com->user_id)
<div class="col-lg-4 text-right" style="position: absolute;right: 15px;">
    <div class="dropdown-secondary dropdown d-inline-block">
        <span id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert" style="cursor: pointer;"></i>
        <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <a class="dropdown-item waves-light waves-effect editComment" onclick="editPopup({{$com->id}},{{$com->timeline_id}})" href="javascript:;"><i class="icofont icofont-checked m-r-10"></i>Edit</a>
            <a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="OpenDelete({{$com->id}});"><i class="fa fa-trash m-r-10"></i>Delete</a>
        <!-- end of dropdown menu -->
        </div>
    </div>
</div>
@endif
    <div class="media-body b-b-theme social-client-description">
        <div class="chat-header">{{$com->first_name}} {{$com->last_name}}<span
                class="text-muted">
                @if(strtotime($com->updated_at) != strtotime($com->created_at))
                   Edited {{ \Carbon\Carbon::parse($com->updated_at)->diffForHumans()}}
                @else
                    {{ \Carbon\Carbon::parse($com->created_at)->diffForHumans()}}
                @endif
            </span></div>
        <p class="text-muted" id="commentval{{$com->id}}">{{$com->comment}}</p>
    </div>

</div>