# my-coding-template

Viteをベースとした、モダンなフロントエンド開発のためのスターターテンプレートです。

## 特徴

- ⚡ **Vite** - 高速なビルドツールと開発サーバー
- 🎨 **SCSS対応** - Sassプリプロセッサとglobインポート機能
- 📄 **EJSテンプレート** - 動的なHTML生成
- 📦 **マルチページ対応** - 複数のHTML、JS、SCSSファイルを自動検出
- 🔥 **HMR (Hot Module Replacement)** - 開発時の即座な反映
- 🏗️ **最適化されたビルド** - Rollupによる本番環境向けバンドル

## 必要要件

- Node.js 20.x 以上 または 22.x 以上
- npm または pnpm

## インストール

```bash
# 依存関係のインストール
npm install
# または
pnpm install
```

## 使い方

### 開発サーバーの起動

```bash
npm run dev
```

開発サーバーが `http://localhost:3000` で起動します。

### 本番環境用ビルド

```bash
npm run build
```

ビルド結果は `dist/` ディレクトリに出力されます。

### ビルドのプレビュー

```bash
npm run preview
```

本番環境用ビルドをローカルでプレビューできます。

## ディレクトリ構造

```
my-coding-template/
├── src/                           # ソースコードディレクトリ
│   ├── assets/
│   │   ├── scripts/               # JavaScriptファイル
│   │   └── styles/                # SCSS/CSSファイル
│   ├── components/                # 再利用可能なコンポーネント
│   ├── public/
│   │   └── assets/
│   │       └── images/            # 画像ファイル
│   └── index.html                 # メインHTMLエントリーポイント
├── public/                        # 静的アセット
├── dist/                          # ビルド出力ディレクトリ
├── vite.config.js                 # Vite設定ファイル
└── package.json                   # パッケージ設定
```

## 技術スタック

- **Vite** ^7.1.7 - ビルドツール
- **Sass** ^1.93.2 - CSSプリプロセッサ
- **vite-plugin-ejs** ^1.7.0 - EJSテンプレート対応
- **vite-plugin-sass-glob-import** ^6.0.0 - SCSS globインポート機能

## Vite設定の特徴

- **自動エントリーポイント検出**: `src/**/*.js`、`src/assets/styles/pages/**/*.scss`、`src/**/*.html` を自動的にスキャン
- **カスタム出力構造**: アセットを意味のあるディレクトリに整理（styles/、js/、images/）
- **開発サーバー**: ポート3000で起動
- **ビルドルート**: `./src` ディレクトリ
