/**
 * Retrieve the chunk name based on module and graphs.
 *
 * @param {Object} module A module object.
 * @param {Object} graphs An object containing ModuleGraph and ChunkGraph.
 * @return {string} The chunk name.
 */
const recursiveIssuer = ( module, graphs ) => {
	const issuer = graphs.moduleGraph.getIssuer( module );

	if ( issuer ) {
		return recursiveIssuer( issuer, graphs );
	}

	const chunks = graphs.chunkGraph.getModuleChunks( module );

	for ( const chunk of chunks ) {
		return chunk.name;
	}

	return false;
};

module.exports = {
	recursiveIssuer,
};
