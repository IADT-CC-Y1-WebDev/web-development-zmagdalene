        <div id="overlay" class="hidden">
            <div class="deletePopup">

                <h2>Are you sure you want to delete this book?</h2>
                <h2 class="bookTitle"> <?= $book->title ?> </h2>
                <p>This action is permanent and cannot be undone.</p>

                <div class="buttons">
                    <button type="button" id="confirmBtn" class="largeBtn">Delete Book</button>
                    <button type="button" id="cancelBtn" class="largeBtn">Cancel</button>
                </div>
            </div>
        </div>