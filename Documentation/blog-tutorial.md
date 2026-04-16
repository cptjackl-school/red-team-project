# Retro Restoration Theme Guide

This guide explains how to set up the Retro Restoration theme, manage content in WordPress, and use the built-in account, WooCommerce, and policy page templates.

## 1. Theme Setup

1. Install WordPress in LocalWP or your hosting environment.
2. Copy or symlink the `theme/` folder into `wp-content/themes/`.
3. In WordPress, go to Appearance > Themes and activate Retro Restoration.
4. Make sure the following plugins are installed and active before you build the site content:
    - WooCommerce
    - Members plugin, if you want role-based content restrictions
    - Embeds Plus for Youtube
5. Confirm the theme is loading by visiting the homepage and a single post.

The theme is set up to mostly work just based on the code with little admin customization needed. The navigation menus will auto generate based on the categories you create and/or link to appropiate archive pages for standard tags.

## 2. Site Structure And Content Model

The theme is built around posts, categories, and tags.

Posts are used for regular content like articles, tutorials, and videos. Categories are used mostly to organize conent by what console they relate to, with top level categories being brands and child categories being specific models. Tags are used to split content into landing pages such as articles, videos, tutorials, and reviews

Important conventions used by the theme:

- `Consoles` is the main category-based archive.
- `article` tag feeds the Articles page.
- `video` tag feeds the Videos page.
- `tutorials` or `tutorial` tags are used in the navigation fallback.
- `reviews` or `review` tags are used in the navigation fallback.
- `refund` tag is used by the refund policy policy page.
- `privacy` tag is used by the privacy policy policy page.

## 3. Creating Posts, Tags, And Categories

### Create a post

1. Go to Posts > Add New.
2. Add a title, content, featured image, and any media you want.
3. Assign one or more categories.
4. Assign the right tags depending on where the post should appear.
5. Publish the post.

### Use categories

Categories control the broader browse experience. The theme uses the category archive for the `Consoles` section and can display parent and child categories in the main menu fallback.

Recommended setup:

- Create a parent category for each major console family or topic.
- Add child categories for specific models, eras, or subtopics.
- Keep the default uncategorized category unused if possible.

### Use tags

Tags control special content streams and policy pages.
By default this is articles, videos, turorials, and reviews

## 4. How The Theme Uses Posts, Tags, And Categories

The theme’s templates pull content from specific taxonomies and post types:

- The Articles page shows published posts tagged `article`.
- The Videos page shows published posts tagged `video`.

The tag for video or article aslo determines the template used to display the post, with a custom video template for posts tagged `video` and a standard single post template for other posts.

- The refund policy starter page loads the first published post tagged `refund`.
- The privacy policy starter page loads the first published post tagged `privacy`.
- The header and footer menus can fall back to built-in links if no WordPress menu is assigned.

That means you manage most of the site by tagging posts correctly instead of creating a lot of custom templates.

## 5. Setting Social Links

The theme exposes social links in the Customizer.

1. Go to Appearance > Customize.
2. Open the Social Links section.
3. Enter the full URL for each network you want to show.
4. Save and publish.

The theme supports these networks:

- Facebook
- X
- Instagram
- Discord
- YouTube

The social link buttons will only show if a url is inputted so you can set only the oens you need. Discord has been made larger to pull more people in towards the community.

## 6. Members Plugin And Role-Based Restrictions

The theme does not hard-code role restrictions itself. If you want to restrict posts to specific roles, use the Members plugin to manage access rules.

Typical workflow:

1. Install and activate the Members plugin.
2. Create or verify the user roles you need, such as Subscriber, Customer, Editor, or a custom role.
3. Open the post, page, or category you want to protect.
4. Add a restriction rule in the Members UI.
5. Choose which roles can view the content.
6. Save and test with an account that does not have access.

Practical guidance:

- Use role restrictions for premium tutorials, internal product pages, or member-only downloads.
- If you want a whole section protected, apply the rule to the parent page or category archive rather than one post at a time.
- Test both logged-out and logged-in users after making a change.

WooCommerce also has an option for managing user roles in a more automated way but it is a premium feature.

## 7. User Registration And Account Screen

The theme includes a built-in login/register page template and a My Account template.

### Login/Register page

The theme automatically ensures a page exists at the `my-account` slug and assigns the login/register template to it. That page provides:

- A login form
- A registration form
- Inline notices for common errors and success states
- A redirect into the account area after sign-in or registration

How it works:

- Login accepts either username or email plus password.
- Registration accepts optional username, required email, password, and password confirmation.
- If WooCommerce is active, new users are created with the `customer` role.
- After registration, the user is signed in automatically.

### My Account page

The My Account page provides access to:

- Dashboard
- Orders
- Downloads
- Addresses
- Account details

To set it up:

1. Create a page named My Account.
2. Assign the My Account page template if needed.
3. Set that page as the WooCommerce My Account page in WooCommerce settings.
4. Test it while logged in and while logged out.

## 8. WooCommerce Setup

The theme adds WooCommerce support and styles the store, product archive, single product pages, cart, checkout, and account areas.

### Initial WooCommerce setup

1. Install and activate WooCommerce.
2. Run the WooCommerce onboarding wizard.
3. Create the store pages WooCommerce needs: Shop, Cart, Checkout, and My Account.
4. Assign the pages in WooCommerce > Settings > Advanced if they are not assigned automatically.
5. Set currency, shipping, taxes, and payment methods.

### Store pages used by the theme

- Shop and product archive pages use the theme’s WooCommerce styling.
- Cart uses the `woocommerce_cart` shortcode.
- Checkout uses the `woocommerce_checkout` shortcode.
- My Account uses the `woocommerce_my_account` shortcode.

### Managing products

1. Go to Products > Add New.
2. Add a product title, full description, short description, and featured image.
3. Set the price and inventory data.
4. Add product categories and tags.
5. Publish the product.

Recommended product organization:

- Use product categories for broad store structure.
- Use product tags for cross-cutting labels like featured, pre-owned, new arrival, or platform.
- Add product galleries so archive and product pages look complete.

The theme removes the default WooCommerce sidebar so product pages stay focused and full-width.

## 9. Refund Policy Page

The theme includes a starter refund policy page template that pulls content from the first published post tagged `refund`.

Recommended setup:

1. Create a post titled something like Refund & Returns Policy.
2. Add the `refund` tag to that post.
3. Write the refund text in the post body.
4. Create a page for the policy and assign the refund policy starter template.
5. Publish the page.

When the template finds a published post with the `refund` tag, it displays that post content on the policy page. If no matching post exists, the page shows a fallback message.

## 10. Privacy Policy Page

The privacy policy page works the same way as the refund policy page, but it looks for the `privacy` tag.

Recommended setup:

1. Create a post titled something like Privacy Policy.
2. Add the `privacy` tag to that post.
3. Add your privacy policy content.
4. Create a page for the policy and assign the privacy policy starter template.
5. Publish the page.

The footer and account navigation can link to the privacy policy page once it exists.

## 11. Recommended Publishing Workflow

Use this order when building the site:

1. Activate the theme.
2. Install WooCommerce.
3. Create the My Account, Cart, Checkout, Refund Policy, and Privacy Policy pages.
4. Create your core categories and tags.
5. Publish a few posts to test the article and video landing pages.
6. Add products and verify the shop, cart, and checkout flow.
7. Configure social links in the Customizer.
8. Install Members and test any restricted content.

## 12. Quick Checks Before Going Live

- The header menu displays correctly.
- The footer menu displays correctly.
- Social links open the right URLs.
- Article and video landing pages show the correct posts.
- Console category archives show the expected content.
- The login and registration flow works.
- WooCommerce cart and checkout render correctly.
- The refund and privacy pages load content from the correct tagged posts.

\*writing aided with copilot with lots of specific editing done after initial structure
prompt:OK now I need to made a blog-tutorial.md file in the documention folder that acts as a guide for hwo to use the theme and manage wordpress. THe tutorial should cover hwo to set up the theme, how to create posts, tags, and categories, and how th theme uses them. How to set the social links. How the Members plugin works and how he can restrict posts to specific roles. How the user registration and account screen work. How to set up the Woo Commerce section, and how to mange the products, refund policy page, and privacy policy page
