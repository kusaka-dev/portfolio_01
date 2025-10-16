# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Vite-based static site project using TypeScript, Sass, and EJS templates. It's configured for building Japanese websites with a focus on performance and modern development practices.

## Essential Commands

```bash
# Install dependencies (using pnpm)
pnpm install

# Start development server (port 3000)
pnpm run dev

# Build for production
pnpm run build

# Preview production build
pnpm run preview

# Build with cache busting (README mentions this but script not in package.json)
CACHE_BUSTER=true pnpm run build
```

## Architecture & Structure

### Build Configuration
- **Entry Points**: Automatically detected via glob patterns in `vite/config/input.js`:
  - JS files: `src/assets/js/**/*.js` (excludes modules/ directories)
  - SCSS files: `src/assets/css/**/*.scss` (excludes files starting with underscore)
  - HTML files: `src/**/*.html`
- **Output Structure**: 
  - JS: `dist/assets/js/[name].js`
  - CSS: `dist/assets/css/[name].css`
  - Images: Original file structure preserved
  - HTML: Relative paths maintained

### TypeScript Configuration
- Target: ES2020 with strict mode enabled
- Module resolution: bundler mode
- All TypeScript files compile to JavaScript during build

### Component System
- **EJS Templates**: Located in `src/components/` (e.g., `_header.ejs`, `_footer.ejs`)
- **JavaScript Components**: Modular structure in `src/assets/js/component/`
  - Each component typically has its own directory with `index.ts`
  - Main entry point: `src/assets/js/main.js` imports and initializes components

### Validation System
The project includes custom Vite plugins for validation:
- **HTML Validation**: Uses HTMLHint for HTML linting
- **Image Validation**: Checks image file sizes (limit: 1024KB)
- **Heading Structure Validation**: Ensures proper HTML heading hierarchy

### Development Notes
- Node.js version: >=18.0.0 (managed by Volta: 18.19.1)
- Package manager: pnpm (8.15.4)
- The project uses sass-embedded instead of node-sass
- Global Sass imports are supported via `vite-plugin-sass-glob-import`
- Animation framework: anime.js is available as a dependency (though not in package.json dependencies)

## HTML Page Structure

### Base index.html Structure

When creating new pages, use the following template structure. Please review the design and set the `pageclass` appropriately.
```html
<% var pageclass='news_page' ; %>
<%- include('./components/_header.ejs', { pageclass: pageclass }) %>

<div class="container">
</div>

<%- include('./components/_footer.ejs') %>
```
### Important Notes

- Set the pageclass variable to an appropriate value based on each page's purpose
- Pass the pageclass parameter to the header component
- Place main content within the container class
- The footer component is used consistently across all pages

### Coding Guidelines

- Use semantic HTML: Write semantic code with proper HTML5 elements (header, main, section, article, nav, etc.)
- Faithful design reproduction: Reproduce the design faithfully - without adding custom modifications
- Simple structure: Keep the code structure simple and maintainable
- Dynamic content consideration: Review the design and implement flexible code that can handle dynamic content changes when necessary

### CSS Class Naming Conventions
- **BEM methodology**: Use Block__Element__Modifier format
  - Block: `mainvisual_block`, `news_scroller_block`, `emergency_notice_block`
  - Element: `mainvisual_block__logo`, `news_scroller_block__inner`, `emergency_notice_block__text`
- **Block naming pattern**: 
  - Follow `[function_name]_block` format (e.g., `mainvisual_block`, `news_scroller_block`)
  - Use descriptive English name representing function/role + `_block` suffix
  - Set block names per section or component unit
- **Underscore separation**: Use `_` (underscore) to separate words
- **English naming**: Use English for class names as the standard
- **Semantic naming**: Use names that represent functionality or role (`scroller`, `notice`, `inner`, etc.)
- **JavaScript IDs**: Use `js-` prefix for JavaScript hooks (e.g., `id="js-mainvisual-slider"`)
- **Clear hierarchy**: Use `__inner` to indicate inner containers
- **Specific element names**: Use descriptive element names like `__logo`, `__text`, `__item` to clearly express content

## Common Layout & Component Structures

#### 1-3 Column Sections
```html
<!-- 1 Column Section - 基本的なセクション構造 -->
<section class="[name]_block">
    <!-- コンテンツ幅制御用のinner要素 -->
    <div class="[name]_block__inner">
        <!-- セクションタイトル（オプション） -->
        <h2 class="[name]_block__title">Title</h2>
        <!-- メインコンテンツエリア -->
        <div class="[name]_block__content">
            <!-- Single column content -->
        </div>
    </div>
</section>

<!-- 2 Column Section - 左右分割レイアウト -->
<section class="[name]_block">
    <div class="[name]_block__inner">
        <div class="[name]_block__content">
            <!-- 左カラム -->
            <div class="[name]_block__left">
                <!-- Left column content -->
            </div>
            <!-- 右カラム -->
            <div class="[name]_block__right">
                <!-- Right column content -->
            </div>
        </div>
    </div>
</section>

<!-- 3 Column Section - 3等分レイアウト -->
<section class="[name]_block">
    <div class="[name]_block__inner">
        <div class="[name]_block__content">
            <!-- 各カラムアイテム（3つ） -->
            <div class="[name]_block__item">
                <!-- Column 1 content -->
            </div>
            <div class="[name]_block__item">
                <!-- Column 2 content -->
            </div>
            <div class="[name]_block__item">
                <!-- Column 3 content -->
            </div>
        </div>
    </div>
</section>

```
```SCSS
// 1 Column Section - 基本セクションスタイル
.[name]_block {
    // セクション全体のパディング（**デザインファイルの値を確認して設定**）
    padding: [design_padding_vertical]px [design_padding_horizontal]px;
    
    // タブレット対応（Viteの設定変数を使用）
    @include tablet {
        padding: calc([design_padding_vertical] / #{$device_tab} * 100vw) calc([design_padding_horizontal] / #{$device_tab} * 100vw);
    }
    
    // スマートフォン対応（**デザインファイルの値を確認して設定**）
    @include sp {
        padding: calc([sp_design_padding_vertical] / #{$device_sp} * 100vw) calc([sp_design_padding_horizontal] / #{$device_sp} * 100vw);
    }
    
    // コンテンツ幅制御コンテナ
    &__inner {
        max-width: [design_max_width]px; // **デザインファイルで指定された最大幅を使用**
        width: 100%;
        margin: 0 auto; // 中央寄せ
    }
    
    // セクションタイトルスタイル
    &__title {
        font-family: [project_font]; // **プロジェクトで使用するフォントファミリーを設定**
        font-weight: [design_weight];
        font-size: [design_font_size]px; // **デザインファイルの値を優先**
        line-height: [design_line_height];
        letter-spacing: [design_letter_spacing]px;
        text-align: center;
        color: [design_color];
        margin-bottom: [design_margin]px;
        
        @include tablet {
            font-size: calc([design_font_size] / #{$device_tab} * 100vw);
            margin-bottom: calc([design_margin] / #{$device_tab} * 100vw);
        }
        
        @include sp {
            // min()でフォントサイズの上限を設定
            font-size: min(calc([sp_design_font_size] / #{$device_sp} * 100vw), [design_font_size]px);
            margin-bottom: calc([sp_design_margin] / #{$device_sp} * 100vw);
            letter-spacing: [sp_design_letter_spacing]px; // スマホでは字間を調整
        }
    }
}

// 2-3 Column Layout - マルチカラムレイアウト
.[name]_block {
    &__content {
        display: flex;
        gap: [design_gap]px; // **デザインファイルでカラム間隔を確認**
        
        @include tablet {
            gap: calc([design_gap] / #{$device_tab} * 100vw);
        }
        
        @include sp {
            // スマホでは縦積みレイアウトに変更
            flex-direction: column;
            gap: calc([sp_design_gap] / #{$device_sp} * 100vw);
        }
    }
    
    // 3カラムの各アイテム（均等幅）
    &__item {
        flex: 1; // 均等に幅を分配
    }
    
    // 2カラムの左右要素（個別に幅調整可能）
    &__left {
        flex: 1; // または具体的な幅指定
    }
    
    &__right {
        flex: 1; // または具体的な幅指定
    }
}

```

#### Button Components
```html
<!-- Button with Icon - アイコン付きボタン -->
<a href="#" class="[name]_block__button">
    Button Text
    <!-- アイコン画像（矢印など） -->
    <img src="./assets/img/common/icon/ico_arrow.svg" alt="">
</a>

<!-- Button without Icon - テキストのみボタン -->
<a href="#" class="[name]_block__button">
    Button Text
</a>

<!-- Button as button element - フォーム用ボタン -->
<button type="button" class="[name]_block__button">
    Button Text
    <img src="./assets/img/common/icon/ico_arrow.svg" alt="">
</button>
```

```SCSS
.[name]_block {
    &__button {
        // ボタンの基本レイアウト（フレックスでアイコンとテキストを配置）
        display: inline-flex;
        align-items: center;
        gap: [design_gap]px; // **デザインファイルでテキストとアイコンの間隔を確認**
        
        // フォント設定（**プロジェクトで使用するフォントを指定**）
        font-family: [project_font];
        font-weight: [design_weight];
        font-size: [design_font_size]px; // **デザインファイルの値を使用**
        line-height: [design_line_height];
        letter-spacing: [design_letter_spacing]px;
        color: [design_color]; // **デザインで指定されたカラーを使用**
        
        // パディング（**デザインファイルの値を優先**）
        padding: [design_padding_vertical]px [design_padding_horizontal]px;
        
        // ボーダー（デザインに応じて調整）
        border-bottom: [design_border_width]px solid [design_border_color];
        border-top: none;
        border-left: none;
        border-right: none;
        background: none; // 背景色なし
        
        // リンク・ボタンの基本設定
        text-decoration: none;
        cursor: pointer;
        
        // ホバー・フォーカス時のアニメーション
        transition: all 0.3s ease;
        
        // タブレット対応
        @include tablet {
            padding: calc([design_padding_vertical] / #{$device_tab} * 100vw) calc([design_padding_horizontal] / #{$device_tab} * 100vw);
            font-size: calc([design_font_size] / #{$device_tab} * 100vw);
            gap: calc([design_gap] / #{$device_tab} * 100vw);
        }
        
        // スマートフォン対応
        @include sp {
            padding: calc([sp_design_padding_vertical] / #{$device_sp} * 100vw) calc([sp_design_padding_horizontal] / #{$device_sp} * 100vw);
            font-size: min(calc([sp_design_font_size] / #{$device_sp} * 100vw), [design_font_size]px);
            gap: calc([sp_design_gap] / #{$device_sp} * 100vw);
        }
        
        // ホバー効果（デザインに応じて調整）
        &:hover {
            opacity: [design_hover_opacity]; // **デザインでホバー効果を確認**
        }
        
        // アイコン画像のスタイル（> imgセレクタで直接指定）
        > img {
            width: [design_icon_size]px; // **デザインファイルでアイコンサイズを確認**
            height: [design_icon_size]px;
            
            // アイコンのアニメーション
            transition: transform 0.3s ease;
            
            // タブレット・スマートフォン対応
            @include tablet {
                width: calc([design_icon_size] / #{$device_tab} * 100vw);
                height: calc([design_icon_size] / #{$device_tab} * 100vw);
            }
            
            @include sp {
                width: min(calc([sp_design_icon_size] / #{$device_sp} * 100vw), [design_icon_size]px);
                height: min(calc([sp_design_icon_size] / #{$device_sp} * 100vw), [design_icon_size]px);
            }
        }
        
        // ホバー時のアイコンアニメーション（デザインで動きを確認）
        &:hover > img {
            transform: translateX([design_animation_distance]px); // **デザインでアニメーション距離を確認**
        }
        
        // フォーカス時のアクセシビリティ対応
        &:focus {
            outline: 2px solid [design_focus_color];
            outline-offset: 2px;
        }
        
        // 無効状態のスタイル
        &:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            
            &:hover {
                opacity: 0.5; // ホバー効果を無効化
                
                > img {
                    transform: none; // アイコンアニメーション無効化
                }
            }
        }
    }
}
```

## Image Naming Conventions

To maintain organization in the img folder, follow these standardized naming conventions. Use underscores (_) to connect words.

| Image Type | Naming Convention |
|---|---|
| Photos and images | `pic_xxxx.jpg` |
| Transparent bitmap images | `pic_xxxx.png` |
| Background images | `bg_xxxx.jpg` |
| Text images | `txt_xxxx.svg` |
| Icons | `ico_xxxx.svg` |
| Logos | `logo_xxxx.svg` |
| PDF files | `pdf_xxxx.pdf` |