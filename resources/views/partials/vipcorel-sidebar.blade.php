{{-- Tìm thành viên --}}
<form action="#" method="post" class="block" data-widget-id="1" data-widget-key="member_wrapper_find_member" data-widget-definition="find_member">
    <div class="block-container">
        <h3 class="block-minorHeader">Tìm thành viên</h3>
        <div class="block-body block-row">
            <input type="text" class="input" data-xf-init="auto-complete" data-single="true" name="username" data-autosubmit="true" maxlength="50" placeholder="Tên…" />
        </div>
    </div>
    <input type="hidden" name="_xfToken" value="1758127904,e24985162e1ffbca7ea31396c69430cc" />
</form>

{{-- Thành viên mới --}}
<div class="block" data-widget-id="2" data-widget-key="member_wrapper_newest_members" data-widget-definition="newest_members">
    <div class="block-container">
        <h3 class="block-minorHeader">Thành viên mới</h3>
        <div class="block-body block-row">
            <ul class="listHeap">
                @foreach($newestMembers ?? [] as $member)
                    <li>
                        <a href="#" class="avatar avatar--s avatar--default avatar--default--dynamic" data-user-id="{{ $member->id }}" data-xf-init="member-tooltip" img="true" style="background-color: #cc6699; color: #602040">
                            <span class="avatar-u{{ $member->id }}-s" role="img" aria-label="{{ $member->name }}">{{ substr($member->name, 0, 1) }}</span> 
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

{{-- Bài viết mới nhất --}}
@include('partials.widget-latest-posts')

{{-- Thống kê diễn đàn --}}
<div class="block" data-widget-id="9" data-widget-key="forum_overview_forum_statistics" data-widget-definition="forum_statistics">
    <div class="block-container">
        <h3 class="block-minorHeader">Thống kê diễn đàn</h3>
        <div class="block-body block-row">
            <dl class="pairs pairs--justified">
                <dt>Chủ đề</dt>
                <dd>{{ $stats['topics'] ?? 0 }}</dd>
            </dl>

            <dl class="pairs pairs--justified">
                <dt>Bài viết</dt>
                <dd>{{ $stats['posts'] ?? 0 }}</dd>
            </dl>

            <dl class="pairs pairs--justified">
                <dt>Thành viên</dt>
                <dd>{{ $stats['members'] ?? 0 }}</dd>
            </dl>

            <dl class="pairs pairs--justified">
                <dt>Thành viên mới nhất</dt>
                <dd>
                    @if(isset($newestMember))
                        <a href="#" class="username" dir="auto" itemprop="name" data-user-id="{{ $newestMember->id }}" data-xf-init="member-tooltip">{{ $newestMember->name }}</a>
                    @else
                        <span>Chưa có</span>
                    @endif
                </dd>
            </dl>
        </div>
    </div>
</div>

