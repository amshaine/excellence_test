#!/bin/bash
rm -rf frontend
npx create-next-app@latest frontend \
  --typescript \
  --tailwind \
  --eslint \
  --src-dir \
  --app \
  --no-turbo \
  --import-alias "@/*" \
  --use-npm \
  --yes 