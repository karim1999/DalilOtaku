    <div class="form-container" >
        <div id="anime">
            <button v-promise-btn @click="loadAll">Load Anime</button>
            <pre>
                <code v-for="item in list">
                    <li>@{{ item }}</li>
                </code>
            </pre>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/anime2.js') }}" defer></script>
