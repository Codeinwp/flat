<?php

/**
 * Before HTML
 *
 * HTML context: just before `html`
 * THA hook: tha_html_before
 */
function flat_hook_html_before() {
	do_action( 'flat_html_before' );
	do_action( 'tha_html_before' );
}

/**
 * Top of head
 *
 * HTML context: top of `head`
 * THA hook: tha_head_top
 */
function flat_hook_head_top() {
	do_action( 'flat_head_top' );
	do_action( 'tha_head_top' );
}

/**
 * Bottom of head
 *
 * HTML context: bottom of `head`
 * THA hook: tha_head_bottom
 */
function flat_hook_head_bottom() {
	do_action( 'flat_head_bottom' );
	do_action( 'tha_head_bottom' );
}

/**
 * Before page header
 *
 * HTML context: within `div#content`, just before `header.site-header`
 * THA hook: tha_header_before
 */
function flat_hook_header_before() {
	do_action( 'flat_header_before' );
	do_action( 'tha_header_before' );
}

/**
 * Top of header
 *
 * HTML context: top of `header`
 * THA hook: tha_header_top
 */
function flat_hook_header_top() {
	do_action( 'flat_header_top' );
	do_action( 'tha_header_top' );
}

/**
 * Bottom of header
 *
 * HTML context: bottom of `header`
 * THA hook: tha_header_bottom
 */
function flat_hook_header_bottom() {
	do_action( 'flat_header_bottom' );
	do_action( 'tha_header_bottom' );
}

/**
 * After page header
 *
 * HTML context: within `div#content`, just after `header.site-header`
 * THA hook: tha_header_after
 */
function flat_hook_header_after() {
	do_action( 'flat_header_after' );
	do_action( 'tha_header_after' );
}

/**
 * Top of body
 *
 * HTML context: within `body` just before `div#page`
 * THA hook: tha_body_top
 */
function flat_hook_body_top() {
	do_action( 'flat_body_top' );
	do_action( 'tha_body_top' );
}

/**
 * Bottom of body
 *
 * HTML context: within `body` just after `div#page`
 * THA hook: tha_body_bottom
 */
function flat_hook_body_bottom() {
	do_action( 'flat_body_bottom' );
	do_action( 'tha_body_bottom' );
}

/**
 * Before content
 *
 * HTML context: within `div.row`, just before div#primary
 * THA hook: tha_content_before
 */
function flat_hook_content_before() {
	do_action( 'flat_content_before' );
	do_action( 'tha_content_before' );
}

/**
 * Before content
 *
 * HTML context: within `div.row`, just after `div#primary`
 * THA hook: tha_content_after
 */
function flat_hook_content_after() {
	do_action( 'flat_content_after' );
	do_action( 'tha_content_after' );
}

/**
 * Top of content
 *
 * HTML context: top of `div#primary`
 * THA hook: tha_content_top
 */
function flat_hook_content_top() {
	do_action( 'flat_content_top' );
	do_action( 'tha_content_top' );
}

/**
 * Bottom of content
 *
 * HTML context: bottom of `div#primary`
 * THA hook: tha_content_bottom
 */
function flat_hook_content_bottom() {
	do_action( 'flat_content_bottom' );
	do_action( 'tha_content_bottom' );
}

/**
 * Before entry
 *
 * HTML context: within `article`, before `div.entry-content`
 * THA hook: tha_entry_before
 */
function flat_hook_entry_before() {
	do_action( 'flat_entry_before' );
	do_action( 'tha_entry_before' );
}

/**
 * After entry
 *
 * HTML context: within `article`, after `div.entry-content`
 * THA hook: tha_entry_after
 */
function flat_hook_entry_after() {
	do_action( 'flat_entry_after' );
	do_action( 'tha_entry_after' );
}

/**
 * Top of entry
 *
 * HTML context: top of `div.entry-content`
 * THA hook: tha_entry_top
 */
function flat_hook_entry_top() {
	do_action( 'flat_entry_top' );
	do_action( 'tha_entry_top' );
}

/**
 * Bottom of entry
 *
 * HTML context: bottom of `div.entry-content`
 * THA hook: tha_entry_bottom
 */
function flat_hook_entry_bottom() {
	do_action( 'flat_entry_bottom' );
	do_action( 'tha_entry_bottom' );
}

/**
 * Before page lists
 *
 * HTML context: within `div#primary`, just before `div#content`
 */
function flat_hook_page_before() {
	do_action( 'flat_page_before' );
}

/**
 * After page lists
 *
 * HTML context: within `div#primary`, just after `div#content`
 */
function flat_hook_page_after() {
	do_action( 'flat_page_after' );
}

/**
 * Top of page lists
 *
 * HTMl context: top of `div#content`
 */
function flat_hook_page_top() {
	do_action( 'flat_page_top' );
}

/**
 * Bottom of page lists
 *
 * HTML context: bottom of `div#content`
 */
function flat_hook_page_bottom() {
	do_action( 'flat_page_bottom' );
}

/**
 * Before index list
 *
 * HTML context: within `div#primary`, just before `div#content`
 */
function flat_hook_index_before() {
	do_action( 'flat_index_before' );
}

/**
 * After index list
 *
 * HTML context: within `div#primary`, just after `div#content`
 */
function flat_hook_index_after() {
	do_action( 'flat_index_after' );
}

/**
 * Top of index list
 *
 * HTMl context: top of `div#content`
 */
function flat_hook_index_top() {
	do_action( 'flat_index_top' );
}

/**
 * Bottom of index list
 *
 * HTML context: bottom of `div#content`
 */
function flat_hook_index_bottom() {
	do_action( 'flat_index_bottom' );
}

/**
 * Before archive lists
 *
 * HTML context: within `div#primary`, just before `div#content`
 */
function flat_hook_archive_before() {
	do_action( 'flat_archive_before' );
}

/**
 * After archive lists
 *
 * HTML context: within `div#primary`, just after `div#content`
 */
function flat_hook_archive_after() {
	do_action( 'flat_archive_after' );
}

/**
 * Top of archive lists
 *
 * HTMl context: top of `div#content`
 */
function flat_hook_archive_top() {
	do_action( 'flat_archive_top' );
}

/**
 * Bottom of archive lists
 *
 * HTML context: bottom of `div#content`
 */
function flat_hook_archive_bottom() {
	do_action( 'flat_archive_bottom' );
}

/**
 * Before search results
 *
 * HTML context: within `div#primary`, just before `div#content`
 */
function flat_hook_search_before() {
	do_action( 'flat_search_before' );
}

/**
 * After search results
 *
 * HTML context: within `div#primary`, just after `div#content`
 */
function flat_hook_search_after() {
	do_action( 'flat_search_after' );
}

/**
 * Top of search results
 *
 * HTMl context: top of `div#content`
 */
function flat_hook_search_top() {
	do_action( 'flat_search_top' );
}

/**
 * Bottom of search results
 *
 * HTML context: bottom of `div#content`
 */
function flat_hook_search_bottom() {
	do_action( 'flat_search_bottom' );
}

/**
 * Before comment section
 *
 * HTML context: within `div#primary`, just before `div#comments`
 * THA hook: `tha_comments_before`
 */
function flat_hook_comments_before() {
	do_action( 'flat_comments_before' );
	do_action( 'tha_comments_before' );
}

/**
 * After comment section
 *
 * HTML context: within `div#primary`, just after `div#comments`
 * THA hook: `tha_comments_before`
 */
function flat_hook_comments_after() {
	do_action( 'flat_comments_after' );
	do_action( 'tha_comments_after' );
}

/**
 * Top of comment section
 *
 * HTML context: top of `div#comments`
 */
function flat_hook_comments_top() {
	do_action( 'flat_comments_top' );
}

/**
 * Bottom of comment section
 *
 * HTML context: bottom of `div#comments`
 */
function flat_hook_comments_bottom() {
	do_action( 'flat_comments_bottom' );
}

/**
 * Before sidebar
 *
 * HTML context: within `div.sidebar-offcanvas`, just before `div#main-sidebar`
 * THA hook: tha_sidebars_before
 */
function flat_hook_sidebar_before() {
	do_action( 'flat_sidebar_before' );
	do_action( 'tha_sidebars_before' ); # Pluralization is intentional
}

/**
 * After sidebar
 *
 * HTML context: within `div.sidebar-offcanvas`, just after `div#main-sidebar`
 * THA hook: tha_sidebars_after
 */
function flat_hook_sidebar_after() {
	do_action( 'flat_sidebar_after' );
	do_action( 'tha_sidebars_after' ); # Pluralization is intentional
}

/**
 * Top of sidebar
 *
 * HTML context: top of div#main-sidebar
 * THA hook: tha_sidebar_top
 */
function flat_hook_sidebar_top() {
	do_action( 'flat_sidebar_top' );
	do_action( 'tha_sidebar_top' );
}

/**
 * Bottom of sidebar
 *
 * HTML context: bottom of div#main-sidebar
 * THA hook: tha_sidebar_bottom
 */
function flat_hook_sidebar_bottom() {
	do_action( 'flat_sidebar_bottom' );
	do_action( 'tha_sidebar_bottom' );
}

/**
 * Content of 404 pages
 *
 * HTML context: within `div.page-content`
 */
function flat_hook_404_content() {
	do_action( 'flat_404_content' );
}

/**
 * Before page footer
 *
 * HTML context: within `div#content`, just before `footer.site-info`
 * THA hook: tha_footer_before
 */
function flat_hook_footer_before() {
	do_action( 'flat_footer_before' );
	do_action( 'tha_footer_before' );
}

/**
 * After page footer
 *
 * HTML context: within `div#content`, just after `footer.site-info`
 * THA hook: tha_footer_after
 */
function flat_hook_footer_after() {
	do_action( 'flat_footer_after' );
	do_action( 'tha_footer_after' );
}

/**
 * Top of page footer
 *
 * HTML context: top of footer.site-info
 * THA hook: tha_footer_top
 */
function flat_hook_footer_top() {
	do_action( 'flat_footer_top' );
	do_action( 'flat_credits' ); # Backwards compatibility
	do_action( 'tha_footer_top' );
}

/**
 * Bottom of page footer
 *
 * HTML context: bottom of footer.site-info
 * THA hook: tha_footer_bottom
 */
function flat_hook_footer_bottom() {
	do_action( 'flat_footer_bottom' );
	do_action( 'tha_footer_bottom' );
}
