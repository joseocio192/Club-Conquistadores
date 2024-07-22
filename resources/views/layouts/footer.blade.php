<footer class="footer">
    <div class='footerItems'>
        <select id="lang" onchange="window.location.href='{{ url('locale') }}/'+this.value">
            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="es" {{ session('locale') == 'es' ? 'selected' : '' }}>Español</option>
            <option value="ko" {{ session('locale') == 'ko' ? 'selected' : '' }}>한국어</option>
            <option value="zh-hans" {{ session('locale') == 'zh-Hans' ? 'selected' : '' }}>简体中文</option>
            <option value="ja" {{ session('locale') == 'ja' ? 'selected' : '' }}>日本語</option>
            <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
        </select>
    </div>
</footer>
