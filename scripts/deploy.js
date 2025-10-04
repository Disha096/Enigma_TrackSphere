import hre from "hardhat";

async function main() {
    const [deployer] = await hre.ethers.getSigners();
    console.log("Deploying contract with account:", deployer.address);

    const Verifier = await hre.ethers.getContractFactory("DocumentVerifier");
    const verifier = await Verifier.deploy();
    await verifier.deployed();

    console.log("Contract deployed to:", verifier.address);
}

main().catch((error) => {
    console.error(error);
    process.exit(1);
});
