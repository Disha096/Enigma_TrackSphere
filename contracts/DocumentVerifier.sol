// SPDX-License-Identifier: MIT
pragma solidity ^0.8.18;

contract DocumentVerifier {
    mapping(bytes32 => bool) private originalDocuments;

    event DocumentRegistered(bytes32 indexed docHash);
    event DocumentVerified(bytes32 indexed docHash, bool isOriginal);

    function registerOriginal(bytes32 docHash) public {
        originalDocuments[docHash] = true;
        emit DocumentRegistered(docHash);
    }

    function verifyDocument(bytes32 docHash) public returns (bool) {
        bool isOriginal = originalDocuments[docHash];
        emit DocumentVerified(docHash, isOriginal);
        return isOriginal;
    }

    function isOriginal(bytes32 docHash) public view returns (bool) {
        return originalDocuments[docHash];
    }
}
