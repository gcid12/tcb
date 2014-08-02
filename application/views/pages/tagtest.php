    <div id="content">
        <p>These demo various features of Tag-it. View the source to see how each works.</p>

        <hr>
        <h3>Minimal</h3>
        <form>
            <p>
                Vanilla example &mdash; the absolute minimum amount of code required, no configuration. No autocomplete, either. See the other examples for that.
            </p>
            <ul id="myTags"></ul>
            <input type="submit" value="Submit">
        </form>

        <hr>
        <h3>Single Input Field</h3>
        <form>
            <p>
                Example using a single input form field to hold all the tag values, instead of one per tag (see settings.singleField).
                This method is particularly useful if you have a form with one input field for comma-delimited tags that you want to trivially "upgrade" to this fancy jQuery UI widget.
                This configuration will also degrade nicely as well for browsers without JS &mdash; the default behavior is to have one input per tag, which does not degrade as well as one comma-delimited input.
            </p>
            <p>
                Normally this input field will be hidden &mdash; we leave it visible here so you can see how it is manipulated by the widget:
                <input name="tags" id="mySingleField" value="Apple, Orange" disabled="true"> <!-- only disabled for demonstration purposes -->
            </p>
            <ul id="singleFieldTags"></ul>
            <input type="submit" value="Submit">
        </form>

        <hr>
        <h3><a name="graceful-degredation"></a>Single Input Field (2)</h3>
        <form>
            <p>
                If you instantiate Tag-it on an INPUT element, it will default to being singleField, with that INPUT element as the singleFieldNode. This is the simplest way to have a gracefully-degrading tag widget.
            </p>
            <input name="tags" id="singleFieldTags2" value="Apple, Orange">
        </form>

        <hr>
        <h3>Spaces Allowed Without Quotes</h3>
        <p>You can already do multiword tags with spaces in them by default, but those must be wrapped in quotes. This option lets you use spaces without requiring the user to quote the input.</p>
        <p>There are normally 5 ways to insert a tag after inputting some text: space, comma, enter, selecting an autocomplete option, or defocusing the widget. With the "allowSpaces" option set to true, space no longer inserts a tag, it just adds a space to the current tag input.</p>
        <form>
            <p></p>
            <ul id="allowSpacesTags"></ul>
        </form>

        <hr>
        <h3>Preloading Data in Markup</h3>
        <form>
            <p>
                Using a UL in HTML to prefill the widget with some tags.
            </p>
            <ul id="myULTags">
                <!-- Existing list items will be pre-added to the tags. -->
                <li>Tag1</li>
                <li>Tag2</li>
            </ul>
        </form>

        <hr>

        <h3>Read-only</h3>
        <form>
            <p>Example of read only tags.</p>
            <ul id="readOnlyTags">
                <li>Tag1</li>
                <li>Tag2</li>
            </ul>
        </form>

        <hr>

        <h3>Events</h3>
        <form>
            <p>Example of tag events. Try adding or removing a tag, adding a duplicate tag, or clicking on a tag's label.</p>
            <ul id="eventTags">
                <li>Click my label</li>
                <li>Remove me</li>
            </ul>
        </form>
        <div id="events_container"></div>

        <hr>

        <h3>Methods</h3>
        <form>
            <p>Demos the available widget methods. Click the links below the widget to try them.</p>
            <ul id="methodTags"></ul>
            <p><a href="#" onclick="var inp=prompt('Enter a tag value to test the createTag method.');$('#methodTags').tagit('createTag', inp);return false;">Create tag</a></p>
            <p><a href="#" onclick="var inp=prompt('Enter a tag value to test the removeTagByName method.');$('#methodTags').tagit('removeTagByName', inp);return false;">Remove tag by name</a></p>
            <p><a href="#" onclick="$('#methodTags').tagit('removeAll');return false;">Clear tags</a></p>
        </form>

        <hr>
        <h3>Remove Confirmation</h3>
        <form>
            <p>
                When removeConfirmation is enabled the user has to press the backspace key twice to remove the last tag.
            </p>
            <ul id="removeConfirmationTags">
                <li>backspace me</li>
                <li>me too</li>
            </ul>
        </form>

    </div>