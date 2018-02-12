<div class="col-sm-4 sidebar">
    <div class="archives">
        <div class="arch-title">
            <h4>Archives</h4>
        </div>
        <div class="arch-body">
            <ol class="list-unstyled">
                @foreach($archives as $archive)
                    <li>
                        <a href="/posts/?month={{$archive->month}}&year={{$archive->year}}">
                            {{$archive->month .' '. $archive->year}}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="top-authors">
        <div class="authors-title">
            <h4>TOP authors</h4>
        </div>
        <ol class="list-unstyled">
            @foreach($topUsers as $author)
                <li>
                    <a href="/posts/?author={{$author->name}}">{{$author->name}}</a>
                </li>
            @endforeach
        </ol>
    </div>
    <div class="top-commentators">
        <div class="com-title">
            <h4>TOP commentators</h4>
        </div>
        <ol class="list-unstyled">
            @foreach($allCommentators as $allCommentator)
               <li>{{$allCommentator->name . ': ' . $allCommentator->count}}</li>
            @endforeach
        </ol>
    </div>
    <div class="links">
        <div>
            <h4 class="links-title">Helpful links</h4>
        </div>
        <div class="links-body">
            <p><a href="https://github.com" target="_blank">GitHub</a></p>
            <p><a href="https://getbootstrap.com/" target="_blank">Bootstrap</a></p>
            <p><a href="https://stackoverflow.com/" target="_blank">Stack Overflow</a></p>
        </div>
    </div>
</div>