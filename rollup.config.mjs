import resolve from '@rollup/plugin-node-resolve';
import terser from '@rollup/plugin-terser';
import minifyLiterals from 'rollup-plugin-minify-html-literals-v3';
import typescript from '@rollup/plugin-typescript';
import sass from 'rollup-plugin-sass';

const config = [
  {
    input: 'store/src/javascript/frontend.ts',
    output: {
      file: 'store/build/frontend.js',
      format: 'umd',
      sourcemap: true,
    },
    plugins: [
      resolve(),
      typescript(),
      minifyLiterals(),
      terser(),
      sass({ output: true })
    ],
    preserveEntrySignatures: false
  },
  {
    input: 'store/src/javascript/admin.ts',
    output: {
      file: 'store/build/admin.js',
      format: 'umd',
      sourcemap: true,
    },
    plugins: [
      resolve(),
      typescript(),
      minifyLiterals(),
      terser(),
      sass({ output: true })
    ],
    preserveEntrySignatures: false
  }
];

export default config;
