<h3>About</h3>
<p>
    The AddThis provides an AddThis.com button or toolbox to let your users share
    your content to social network sites.

    <dl>
        <dt>What is AddThis?</dt>
        <dd>
            <em>
                Launched in September 2006, AddThis is the #1 bookmarking and sharing button on the Internet.
                AddThis has become the standard button for bookmarking and sharing.
                The AddThis button spreads your content across the Web by making it easier for your
                visitors to bookmark and share it with other people, again…and again…and again.
                This simple yet powerful button is very easy to install and provides
                valuable Analytics about the bookmarking and sharing activity of your users.
                AddThis helps your visitors create a buzz for your site and increase its popularity and ranking.
                (source: addthis.com)
            </em>
        </dd>
    </dl>
</p>

<h3>Uses</h3>
<dl>
    <dt>Hooktag</dt>
    <dd>
        <br />
        <code>
            [add_this url='/url/to/share' title='Title of the content being shared' style={1..9} custom_selection=true|false]
        </code>
    </dd>

    <dt>Automatic</dt>
    <dd>
        Through the <?php echo $this->Html->link('settings', '/admin/system/modules/settings/AddThis'); ?> panel you
        can choose to automatically display an <em>AddThis</em> button only for specific content types or specific user roles.
        You will be able to add your Profile ID for analytics purpose and have a custom selection of the social bookmars shown.
    </dd>
</dl>