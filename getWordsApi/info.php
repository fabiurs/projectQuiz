<div class="row">

    <h2>Search for an unknown word</h2>

    <input type="text" name="wordInput" id="wordInput">
    <button id="wordSearch">Search</button>

    <div class="hide-results word-response">
        <div class="c-error-message">
            <p id="error-message"></p>
        </div>

        <div class="c-good-response">
            <p class="myword"></p>

            <p class="synonyms"></p>

            <ul id="definitionList"></ul>
        </div>

        <div class="c-close">
        <i id="closeBtn" class="fas fa-times"></i>
        </div>
    </div>

    <script src="getWordsApi/scriptWord.js"></script>

</div>
