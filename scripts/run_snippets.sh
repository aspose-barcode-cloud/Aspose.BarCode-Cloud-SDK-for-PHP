#!/bin/bash

set -euo pipefail

RUN_DIR="snippets_test"
SNIPPETS_DIR="snippets"
SCRIPT_DIR="scripts"
CONFIG_FILE_PATH="tests/Configuration.json"

rm -rf "${RUN_DIR}" || true
mkdir -p "${RUN_DIR}"

pushd ${RUN_DIR}
ln -sn -F ../src ./src
popd

for file in $(find "${SNIPPETS_DIR}" -name "*.php"); do
    ${SCRIPT_DIR}/run_snippet.sh "$file" $RUN_DIR $SCRIPT_DIR $CONFIG_FILE_PATH || { echo "Error processing $file"; exit 1; }
done

rm -rf "${RUN_DIR}" || true